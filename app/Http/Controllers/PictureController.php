<?php

namespace App\Http\Controllers;

use App\Picture;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Hello wey";
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
            'no' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json('Not a valid request', 400);
        }

        if ($file = $request->file('path')) {
            $date = new DateTime();
            $pictureName = 'picture_' . $request->no . $date->format(' - d-M-Y_h.i.s.v.') . $request->file('path')->extension();

            $picture = Picture::create([
                'no' => $request->no,
                'type' => $request->type,
                'path' => $pictureName,
            ]);
            Storage::putFileAs('images/products/', $file, $pictureName);
            return response()->json($picture, 200);
        } else if ($link = $request->link) {
            $picture = Picture::create([
                'no' => $request->no,
                'type' => $request->type,
                'link' => $link
            ]);
            return response()->json($picture, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
