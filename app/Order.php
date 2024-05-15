<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   // protected $table = ['orders'];
   protected $fillable = [
      'order_id',
      'order_name',
      'order_price',
      'order_total_price',
      'client_id', //forign key
      'product_id'
   ];
   public function bill_forms()
   {
      return $this->belongsTo(BillForm::class, 'client_id', 'id');
     
   }








   // public function products()
   // {
   //     return $this->belongsTo('App\Product');
   // }

}
