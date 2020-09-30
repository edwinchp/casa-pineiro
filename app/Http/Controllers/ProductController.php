<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductCreateRequest;
use Illuminate\Support\Facades\Storage;

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
        if($picture_1 = $request->file('picture_1')){
            $name =  'p1_'. $id. date('_YmdHis') ;
            $picture_1->move('images/products', $name);
            Storage::delete($product->getPicture1()); // deletes old picture
            $product->picture_1 = $name;
        }

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
        
        if($picture_1 = $request->file('picture_1')){
            $name =  'p1_'. $product->id . date('_YmdHis') ;
            $picture_1->move('images/products', $name);
            $product->picture_1 = $name;
        }
        
        $product->save();
        return redirect()->route('product.index');
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
