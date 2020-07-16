<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $with = ['customer'];

    protected $casts = [
        'total' => 'double',
        'total_price' => 'double',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function deliveryMan()
    {
        return $this->belongsTo(DeliveryMan::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
