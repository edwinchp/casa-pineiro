<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class ApiSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //DB::enableQueryLog();
        $request->validate([
            'store_id' => 'required',
            'filter' => 'required',
        ]);

        $filter = array(
            'today' => CarbonImmutable::today()->locale('mx'),
            'weekly' => CarbonImmutable::now()->locale('es_mx')->startOfWeek(),
            'monthly' => CarbonImmutable::now()->locale('es_mx')->startOfMonth(),
            'yearly' => CarbonImmutable::now()->locale('es_mx')->startOfYear(),
            'all' => CarbonImmutable::now()->locale('es_mx')->startOfCentury(),
        );

        $conditions = [
            ['sales.store_id', '=', $request->store_id],
            ['sales.created_at', '>=', $filter[$request->filter]]
        ];

        $user_input = $request->user_input;

        $sales = DB::table('sales')
            ->join('products', function ($join) use ($user_input) {
                $products = $join->on('sales.product_id', '=', 'products.id');

                // In case user is using the search box
                if ($user_input) {
                    $products->where(
                        function ($query) use ($user_input) {
                            $query->where('products.name', 'like', '%' . $user_input . '%')
                                ->orWhere('products.bar_code', 'like', '%' . $user_input . '%');
                        }

                    );
                }
            })
            ->join('users', 'sales.user_id', '=', 'users.id')
            ->leftJoin('customers', 'sales.customer_id', '=', 'customers.id')
            ->where($conditions)
            ->select(
                'sales.id',
                'sales.qty',
                'sales.price',
                'sales.store_id',
                'sales.user_id',
                'sales.created_at',
                'products.id as product_id',
                'products.name',
                'products.bar_code',
                'products.brand',
                'users.name as user_name',
                'customers.name as customer_name',
                'sales.customer_id',
            )->orderBy('sales.created_at', 'desc')->paginate(8);

        $sales_data = DB::table('sales')
            ->join('products', function ($join) use ($user_input) {
                $products = $join->on('sales.product_id', '=', 'products.id');

                // In case user is using the search box
                if ($user_input) {
                    $products->where(
                        function ($query) use ($user_input) {
                            $query->where('products.name', 'like', '%' . $user_input . '%')
                                ->orWhere('products.bar_code', 'like', '%' . $user_input . '%');
                        }

                    );
                }
            })->join('users', 'sales.user_id', '=', 'users.id')
            ->where($conditions);

        setlocale(LC_MONETARY, 'es_MX.UTF-8');

        return [
            //'query' => DB::getQueryLog(),
            //'user_input' => $user_input,
            'pagination' => [
                'total' => $sales->total(),
                'current_page' => $sales->currentPage(),
                'per_page' => $sales->perPage(),
                'last_page' => $sales->lastPage(),
                'from' => $sales->firstItem(),
                'to' => $sales->lastPage(),
            ],
            'sales' => $sales,
            'sales_data' => [
                'products_sold' => $sales_data->count(),
                'products_qty_sold' => $sales_data->sum('sales.qty'),
                'sold_price' =>  number_format($sales_data->sum('sales.price'), 2, '.', ','),
            ]
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            //'product_id' => 'required',
            'store_id' => 'required',
            //'qty' => 'required',
            //'price' => 'required',
            'status' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 400);
        }

        // $product = Product::find($request->product_id);
        // $newQty = $product->qty - $request->qty;

        // if ($newQty >= 0) {
        //     $product->qty = $newQty;
        //     $product->save();

        //     // $sale =  Sale::create($request->all());
        //     // $sale->user_id = auth()->user()->id;
        //     // $sale->save();
        //     // return $sale;

        // } else {
        //     return response()->json([
        //         'message' => 'There are not enough products. Validate quantities.',
        //         'request' => $request->all(),
        //         'product' => $product
        //     ], 400);
        // }

        $sale = Sale::create([
            'store_id' => $request->store_id,
            'status' => 0,
            'is_paid' => 0,
        ]);

        foreach ($request->products as $product) {
            DB::table('sales_products')->insert(
                [
                    'sale_id' => $sale->id,
                    'product_id' => $product['product_id'],
                    'store_id' => $product['store_id'],
                    'name' => $product['name'],
                    'qty' => $product['qty'],
                    'price' => $product['price'],
                    'sub_total' => 548,
                    'is_offer' => 0,
                    //'status' => 1
                ]
            );
        }
        //return $product;

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        if ($request->restore_qty) {
            $product = Product::find($sale->product_id);
            $product->qty = $product->qty + $sale->qty;
            $product->save();
            $sale->delete();
            return response()->json([
                'comments' => 'Sale deleted. Quantity restored to product.',
                'sale qty' => $sale->qty,
                'product qty' => $product->qty,
            ]);
        }

        $sale->delete();
        return response()->json([
            'comments' => 'Sale deleted.',
            'sale' => $sale,
        ]);
    }

    public function allSales(Request $request)
    {
        if ($request->userInput) {
            $filteredSales = Sale::filterByNameBarcodeAndBrand($request->userInput)->get();
            return response()->json($filteredSales, 200);
        }

        $allSales = Sale::all();
        return response()->json($allSales, 200);
    }
}
