<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function getPicture1()
    {
        return '/images/products/' . $this->picture;
    }

    public function getPicture($picture)
    {
        switch ($picture) {
            case "picture":
                return $this->picture;
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
            case "picture":
                $this->picture = $newPicture;
                break;
        }
    }

    public function getMainPicture()
    {
        if ($this->picture != null) {
            return $this->getPicturePath('picture');
        }
        return '/images/default.jpeg';
    }

    public function scopeFilterByNameBarcodeAndBrand($query, $foundByUser, $store_id)
    {
        // return $query
        //     ->where('store_id', '=', $store_id )
        //     ->orwhere('name', 'LIKE', '%' . $foundByUser . '%')
        //     ->orWhere('bar_code', 'LIKE', '%' . $foundByUser . '%')
        //     ->orWhere('brand', 'LIKE', '%' . $foundByUser . '%');
        return $query->where([
            ['store_id', '=', $store_id],
        ])
            ->whereNested(function ($query) use ($foundByUser) {
                $query->where('name', 'LIKE', '%' . $foundByUser . '%')
                    ->orWhere('bar_code', 'LIKE', '%' . $foundByUser . '%')
                    ->orWhere('brand', 'LIKE', '%' . $foundByUser . '%');
            })
            // ->orWhere([
            //     ['bar_code', 'LIKE', '%' . $foundByUser . '%'],
            // ]);
        ;
    }

    public function scopeFilterByNameBarcodeAndBrandToAllStores($query, $foundByUser, $store_ids)
    {

        return $query->whereIn('store_id', $store_ids)
            ->where([
                ['name', 'LIKE', '%' . $foundByUser . '%'],
            ])->orWhere([
                ['bar_code', 'LIKE', '%' . $foundByUser . '%'],
            ]);
    }



    public function scopeFilterByNameBarcodeBrandAndSupplier($query, $foundByUser, $store_id, $supplier_id)
    {
        return $query->where([
            ['store_id', '=', $store_id],
            ['supplier_id', '=', $supplier_id],
        ])
            ->whereNested(function ($query) use ($foundByUser) {
                $query->where('name', 'LIKE', '%' . $foundByUser . '%')
                    ->orWhere('bar_code', 'LIKE', '%' . $foundByUser . '%')
                    ->orWhere('brand', 'LIKE', '%' . $foundByUser . '%');
            });
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture', 'foreign_key');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
}
