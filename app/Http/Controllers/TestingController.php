<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{

    public function string()
    {
        return "Testing an " . "API";
    }

    public function integer()
    {
        return 3 + 7;
    }

    public function array()
    {
        return ["Testing", "an", "API"];
    }

    public function object()
    {
        return [
            "name" => "Ash",
            "last_name" => "Ketchup",
            "age" => 27,
            "pokemon" => ["Pikachu", "Greninja", "Charizard"],

        ];
    }

    public function request(Request $request)
    {
        return "Your request is: " . $request;
    }

    public function requestBody(Request $request)
    {

        if ($request->name) {
            return "Your name is " . $request->name;
        }

        return "Add \"name\" in the body section.";
    }
}
