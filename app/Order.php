<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    const DELIVERY_FEES = 50;
    
    protected $with = ['customer'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
