<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens;
    protected $guarded = [];
    protected $hidden = ['password'];
    protected $with = ['area'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function placeOrder($cart)
    {

        $this->checkProducts($cart);

        $total_price = collect($cart)->pluck('price')->sum();

        $total = $this->getOrderTotal($total_price);

        $order = $this->orders()->create([
            'total_price' => $total_price,
            'total' => $total,
        ]);

        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            $order->details()->create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $product->price,
            ]);

            $product->updateStock($item['quantity']);
        }

        return $order;
    }

    private function checkProducts($cart)
    {
        $products = [];

        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if ($product->stock - $item['quantity'] < 0) {
               array_push($products, $product->id);
            }
        }

        if (count($products) != 0) {
            throw ValidationException::withMessages([
                'message' => 'There is no enough stock for this item',
                'products' => $products
            ]);
        }

    }

    protected function getOrderTotal($total)
    {
        return $total + Setting::find(1)->delivery_dees;
    }
}
