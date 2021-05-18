<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$foundByUser = $request->productsFound;
        //$products = Product::filterByNameBarcodeAndBrand($foundByUser)->get();
        //$userStore = User::find(1); // Pending to define
        $stores = User::find(1)->stores;
        $products = Product::where('store_id', '=', $request->store_id)->paginate(5);

        return [
            'stores' => $stores,
            'pagination' => [
                'total' => $products->total(),
                'current_page' => $products->currentPage(),
                'per_page' => $products->perPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastPage(),
            ],
            'products' => $products
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
        //
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


    /**
     * Additional methods
     */
    public function allProducts(Request $request)
    {

        if ($request->productsFound) {
            $products = Product::filterByNameBarcodeAndBrand($request->productsFound)->get();
            return response()->json($products, 200);
        }

        //$userProducts = User::find(Auth::id())->getUserProducts($request->store_id);
        //$userProducts = Product::all();
        $userProducts = Product::where('store_id', '=', $request->store_id)->get();

        return response()->json($userProducts, 200);
    }

    public function testingProducts(Request $request)
    {

        $products = Product::paginate(5);
        $user = User::getUserProducts(1);
        //return response()->json($products, 200);

        return [
            'pagination' => [
                'total' => $products->total(),
                'current_page' => $products->currentPage(),
                'per_page' => $products->perPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastPage(),
            ],
            'products' => $user
        ];
    }
}
