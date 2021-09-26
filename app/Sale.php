<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function scopeFilterByNameBarcodeAndBrand($query, $userInput)
    {
        return $query->where('name', 'like', '%' . $userInput . '%')
            //->orWhere('name', 'like', '%' + $userInput + '%')
        ;
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function details(){
        return $this->hasMany('App\SalesProducts');
    }

    public function scopeGetProductsSold($query){
        return $query;
    }
}
