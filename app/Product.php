<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function getPicture1(){
        return '/images/products/' . $this->picture_1;
    }
}
