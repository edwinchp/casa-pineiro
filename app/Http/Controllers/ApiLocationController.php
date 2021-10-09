<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Location;
use App\Store;


class ApiLocationController extends Controller
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

        $locations = Store::find($request->store_id)->locations;

        $locations2 = $this->setPrimaryPicture($locations);
        return $locations2;
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
            'name' => 'required',
            'store_id' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 400);
        }

        $location = Location::create([
            'name' => $request->name,
            'store_id' => $request->store_id,
            'description' => $request->description,
        ]);

        return $location;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'store_id' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors->all(), 400);
        }

        $location = Location::findOrFail($id);

        foreach ($request->except(['created_at']) as $key => $value) {
            $location->{$key} = $value;
        }

        $location->save();

        return $location;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);

        $location->delete();

        return response()->json(['message' => 'Location deleted', 'location' => $location], 200);
    }


    public function setPrimaryPicture($locations)
    {
        $locationsArray = [];

        foreach ($locations as $location) {
            $first = $location->pictures()->get()->first();
            if ($first) {
                $primaryPicture = $first->path ? '/images/products/' . $first->path : $first->link;
                $location['primary_picture'] = $primaryPicture;
            } else {
                $location['primary_picture'] = null;
            }
            array_push($locationsArray, $location);
        }
        return $locationsArray;
    }
}
