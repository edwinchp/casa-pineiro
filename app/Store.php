<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer');
    }
}
