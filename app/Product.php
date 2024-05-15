<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = ['products'];
    protected $fillable = [
        'product_id',
        'product_name',
        'product_price',
        'product_image'

    ];
    // public function orders()
    // {
    //     return $this->belongsTo('App\Order');
    // }
}
