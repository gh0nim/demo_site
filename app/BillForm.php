<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillForm extends Model
{
        

    // protected $table=['bill_forms'];
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'cupon_code',
        'order_notes'
    ];
    public function orders()
    {
        return $this->hasMany(Order::class,'client_id','id');
    }
  
}
