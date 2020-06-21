<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    protected $guarded = [];
    protected $with = ['area'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
