<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens;
    protected $guarded = [];
    protected $hidden = ['password'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function placeOrder($cart)
    {
        $order = $this->orders()->create();

        foreach ($cart as $item) {
//            return $item;
            $order->details()->create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => Product::find($item['id'])->price,
            ]);
        }

        return $order;
    }
}
