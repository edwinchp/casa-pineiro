<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

        if ($request->productsFound) {
            $products = Product::filterByNameBarcodeAndBrand($request->productsFound, $request->store_id)->get();
            return response()->json($products, 200);
        }

        $products = Product::where('store_id', '=', $request->store_id)->orderBy('created_at', 'DESC')->paginate(5);

        $productsArray = [];

        foreach ($products as $product) {
            $product['picture'] = $product->pictures()->get()->first();
            array_push($productsArray, $product);
        }

        return [
            'pagination' => [
                'total' => $products->total(),
                'current_page' => $products->currentPage(),
                'per_page' => $products->perPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastPage(),
            ],
            'products' => $productsArray
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
        $product = new Product($request->all());
        $picture = "picture";
        if ($file = $request->file($picture)) {

            $fileName = $picture . date('_His-d-m-Y.') . $file->extension();
            // Save image in products directory
            Storage::putFileAs('images/products/', $file, $fileName);
            // Modify previous image to have 400x400
            Image::make('images/products/' . $fileName)->fit(400, 400)->save();

            // if ($function == "update") {
            //     Storage::delete($product->getPicturePath($picture));
            // }

            // Save file name in the database
            $product->setPicture($picture, $fileName);
        }
        $product->save();
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'product' => $product,
            'pictures' => $product->pictures()->get()
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "smtg";
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'store_id' => 'required',
        ]);

        $product = Product::findOrFail($id);

        foreach ($request->all() as $key => $value) {
            $product->{$key} = $value;
        }

        $product->update();

        return response()->json($request, 200);
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
