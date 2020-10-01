<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductCreateRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.admin_products')->with('products', $products);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->savePicture($request, 'picture_1', $product, "update");

        $product->update($request->except('picture_1'));
        return redirect()->route('product.index');
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductCreateRequest $request)
    {
        $product = Product::create($request->all());

        $this->savePicture($request, "picture_1", $product, "store");

        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * $request - Input request from form
     * $pictureNo - Attribute such as 'picture_1', 'picture_2' and 'picture_3'
     * $product - Product object. Mandatory if Update or Destroy. Add null if Create
     */
    private function savePicture($request, $pictureNo, $product, $function)
    {
        $picture = $request->file($pictureNo);
        $fileName = $pictureNo . date('_His-d-m-Y.') . $picture->extension();
        // Save image in products directory
        $picture->move('images/products/', $fileName);
        // Modify previous image to have 400x400
        Image::make('images/products/' . $fileName)->fit(400, 400)->save();

        if ($function == "update") {
            Storage::delete($product->getPicturePath($pictureNo));
        }

        // Save file name in the database
        $product->setPicture($pictureNo, $fileName);
    }

    public function show()
    {
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->get('searchRequest') . '%')->get();
        return json_encode($products);
    }
}
