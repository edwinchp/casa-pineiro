<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function getPicture1()
    {
        return '/images/products/' . $this->picture_1;
    }

    public function getPicture($picture)
    {
        switch ($picture) {
            case "picture_1":
                return $this->picture_1;
                break;
            case "picture_2":
                return $this->picture_2;
                break;
            case "picture_3":
                return $this->picture_3;
                break;
        }
    }

    public function getPicturePath($picture)
    {
        return '/images/products/' . $this->getPicture($picture);
    }

    public function setPicture($picture, $newPicture)
    {
        switch ($picture) {
            case "picture_1":
                $this->picture_1 = $newPicture;
                break;
            case "picture_2":
                $this->picture_2 = $newPicture;
                break;
            case "picture_3":
                $this->picture_3 = $newPicture;
                break;
        }
    }

    public function getMainPicture()
    {
        if ($this->picture_1 != null) {
            return $this->getPicturePath('picture_1');
        }
        return '/images/default.jpeg';
    }

    public function scopeFilterByNameBarcodeAndBrand($query, $foundByUser)
    {
        return $query->where('name', 'LIKE', '%' . $foundByUser . '%')
            ->orWhere('bar_code', 'LIKE', '%' . $foundByUser . '%')
            ->orWhere('brand', 'LIKE', '%' . $foundByUser . '%');
    }

    // public function store(){
    //     return $this->belongsTo('App\Product');
    // }
}
