<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

class ApiSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return $sales;
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
        // $sale = 
        // Sale::create([
        //     "product_id" => $request['product_id'],
        //     "name" => $request['name'],
        //     "qty" => $request['qty'],
        //     "price" => $request['price'],

        // ]);
        // $sale->save();


        //$sale['']
        //$sale = Sale::create($request->all());
        //$sale->save();
        //return response()->json($sale, 200);

        // foreach(){
        //   $sale=  Sale::create([
        //     "product_id" => $product['product_id'],
        //     "name" => $product['name'],
        //     "qty" => $product['qty'],
        //     "price" => $product['price'],

        // ]);
        // $sale->save();
        // }

        for ($i = 0; $i < count((array)$request->all()); $i++) {

            $sale =  Sale::create([
                "product_id" => $request[$i]['product_id'],
                "name" => $request[$i]['name'],
                "qty" => $request[$i]['qty'],
                "price" => $request[$i]['price'],

            ]);
            $sale->save();
        }

        return $request->all();
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
}
