<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'store_id', 'description'];

    public function pictures()
    {
        return $this->hasMany('App\Picture', 'foreign_key');
    }
}
