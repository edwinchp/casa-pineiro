<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'store_id' => 'required'
        ]);

        $sales = DB::table('sales')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->where('sales.store_id', '=', $request->store_id)
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
            )->orderBy('sales.created_at', 'desc')
            ->get();

        return [
            // 'pagination' => [
            //     'total' => $sales->total(),
            //     'current_page' => $sales->currentPage(),
            //     'per_page' => $sales->perPage(),
            //     'last_page' => $sales->lastPage(),
            //     'from' => $sales->firstItem(),
            //     'to' => $sales->lastPage(),
            // ],
            'sales' => $sales
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
            'product_id' => 'required',
            'store_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'status' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 400);
        }

        $product = Product::find($request->product_id);
        $newQty = $product->qty - $request->qty;

        if ($newQty >= 0) {
            $product->qty = $newQty;
            $product->save();

            $sale =  Sale::create($request->all());
            $sale->user_id = auth()->user()->id;
            $sale->save();
            return $sale;
        } else {
            return response()->json([
                'message' => 'There are not enough products. Validate quantities.',
                'request' => $request->all(),
                'product' => $product
            ], 400);
        }
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
    public function destroy($id)
    {
        //
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
