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
            $productsWithPictures = $this->setPrimaryPicture($products);

            if ($request->allStores == true) {
                $userStores = auth()->user()->stores;
                $stores_ids = [];
                foreach ($userStores as $store) {
                    array_push($stores_ids, $store->id);
                }
                $products = Product::filterByNameBarcodeAndBrandToAllStores($request->productsFound, $stores_ids)->get();

                return response()->json($products, 200);
            }

            if ($request->supplier_id) {
                $products = Product::filterByNameBarcodeBrandAndSupplier($request->productsFound, $request->store_id, $request->supplier_id)->get();
                return response()->json($products, 200);
            }

            return response()->json($productsWithPictures, 200);
        } // end searchbox

        $products = Product::where('products.store_id', '=', $request->store_id)
            ->leftJoin('locations', 'locations.id', '=', 'products.location_id')
            ->where('products.status', 'A')->select('products.*', 'locations.name as location_name')->orderBy('products.created_at', 'DESC')->paginate(8);


        if ($request->supplier_id) {
            $products = Product::where("supplier_id", "=", $request->supplier_id)->paginate(8);
        }

        $productsWithPictures = $this->setPrimaryPicture($products);

        return [
            'pagination' => [
                'total' => $products->total(),
                'current_page' => $products->currentPage(),
                'per_page' => $products->perPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastPage(),
            ],
            'products' => $productsWithPictures
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

        foreach ($request->except(['created_at', 'created_by']) as $key => $value) {
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
        $product = Product::findOrFail($id);
        $message = '';
        if ($product->status == 'A') {
            $message = 'Product inactivated';
            $product->status = 'I';
        } else {
            $message = 'Product activated';
            $product->status = 'A';
        }
        $product->save();

        // Delete completetly, not recommended due to dependencies with Sales
        //$pics = $this->getPicturePaths($product, 'P');
        //Storage::delete($pics);
        //$product->delete();

        return $message;
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
        $userProducts = Product::where('store_id', '=', $request->store_id)->where('status', 'A')->get();

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

    public function setPrimaryPicture($products)
    {
        $productsArray = [];

        foreach ($products as $product) {
            $first = $product->pictures()->where('type', 'P')->get()->first();
            if ($first) {
                $primaryPicture = $first->path ? '/images/products/' . $first->path : $first->link;
                $product['primary_picture'] = $primaryPicture;
            } else {
                $product['primary_picture'] = null;
            }
            array_push($productsArray, $product);
        }
        return $productsArray;
    }

    public function barcodeSearch(Request $request)
    {
        $request->validate([
            'store_id' => 'integer|required',
            'barcode' => 'required',
        ]);

        // Find user stores
        $userStores = auth()->user()->stores;
        $stores_ids = [];
        foreach ($userStores as $store) {
            array_push($stores_ids, $store->id);
        }

        // If user request for an specific store
        $product = Product::where(
            'store_id',
            '=',
            $request->store_id
        )->where('bar_code', '=', $request->barcode)
            ->where('status', 'A')->get();


        // If user requests for all stores
        if ($request->allStores == true) {
            $product = Product::whereIn(
                'store_id',
                $stores_ids
            )->where('bar_code', '=', $request->barcode)
                ->where('status', 'A')->get();
        }


        if (count($product) > 0) {
            return $product[0];
        }

        return null;
    }
}
