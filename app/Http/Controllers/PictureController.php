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
        return "Hello";
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
            'foreign_key' => 'required',
            'no' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['comments' => 'Missing attributes in your request', 'request' => $request], 400);
        }

        if ($file = $request->file('path')) {
            $date = new DateTime();
            $pictureName = 'picture_' . $request->no . $date->format(' - d-M-Y_h.i.s.v.') . $request->file('path')->extension();

            $picture = Picture::create([
                'foreign_key' => $request->foreign_key,
                'no' => $request->no,
                'type' => $request->type,
                'path' => $pictureName,
            ]);
            Storage::putFileAs('images/products/', $file, $pictureName);
            return response()->json(['comments' => 'New picture created', 'picture' => $picture], 200);
        } else if ($link = $request->link) {
            $picture = Picture::create([
                'foreign_key' => $request->foreign_key,
                'no' => $request->no,
                'type' => $request->type,
                'link' => $link
            ]);
            return response()->json(['comments' => 'New link created', 'picture' => $picture], 200);
        }
        return response()->json(['comments' => 'Something went wrong with your request', 'request' => $request], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $picture = Picture::where([
            'type' => $request->type,
            'foreign_key' => $request->foreign_key
        ])->get();
        return $picture;
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
    public function update(Request $request, $id)
    {
        $picture = Picture::findOrFail($id);

        foreach ($request->all() as $key => $value) {
            $picture->{$key} = $value;
        }
        $picture->save();

        return $picture;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picture = Picture::findOrFail($id);

        if ($picture->path != null) {
            Storage::delete('/images/products/' . $picture->path);
        }

        $picture->delete();
        return response()->json('Picture ' . $id . ' deleted', 200);
    }
}
