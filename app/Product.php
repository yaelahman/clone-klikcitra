<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public $incrementing = true;
    public $timestamps = true;

    public function Image()
    {
        return $this->hasOne('App\ImageProduct', 'id_product', 'id');
    }

    public function ImageAll()
    {
        return $this->hasMany('App\ImageProduct', 'id_product', 'id');
    }
}
