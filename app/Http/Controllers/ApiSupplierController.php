<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApiSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 400);
        }


        $suppliers = Supplier::where('store_id', '=', $request->store_id)
            //->addSelect([
            //'products_stored' =>
            //Product::selectRaw('count(name)')->whereColumn('location_id', 'locations.id')])
            ->get();
        //$locations_with_pictures = $this->setPrimaryPicture($suppliers);
        return $suppliers;
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
            'store_id' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 400);
        }

        $supplier = Supplier::create($request->all());

        return $supplier;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Supplier::findOrFail($id);
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
        $validator = Validator::make($request->all(), [
            'store_id' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 400);
        }

        $supplier = Supplier::findOrFail($id);

        foreach ($request->except(['created_at', 'updated_at']) as $key => $value) {
            $supplier->{$key} = $value;
        }

        $supplier->update();

        return response()->json($supplier, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);


        foreach ($supplier->products as $product) {
            $product->supplier()->dissociate();
            $product->save();
        }

        $supplier->delete();



        return response()->json("Supplier deleted", 200);
    }
}
