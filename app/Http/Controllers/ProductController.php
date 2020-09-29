<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductCreateRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.admin_products')->with('products', $products);
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        return($product);//$product->update($request->all());
        //return redirect()->route('product.index');
    }

    public function create(){
        return view('product.create');
    }

    public function store(ProductCreateRequest $request){
        $product = Product::create($request->all());
        $product->save();
        return redirect()->route('product.index');
    }

    public function show(){

    }

    public function search(Request $request){
        
        $products = Product::where('name', 'like', '%' .$request->get('searchRequest').'%')->get();
        return json_encode($products);
    }
}
