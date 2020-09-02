<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductCreateRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('home')->with('products', $products);
    }

    public function edit(){
        return view('product.edit');
    }

    public function create(){
        return view('product.create');
    }

    public function store(ProductCreateRequest $request){
        dd($request);
    }
}
