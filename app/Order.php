<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    const DELIVERY_FEES = 50;

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
