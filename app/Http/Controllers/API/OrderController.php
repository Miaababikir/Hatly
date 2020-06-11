<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = auth()->user()->orders()->create();

        foreach ($request->cart as $item) {
            $order->details()->create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => Product::find($item['id'])->price,
            ]);
        }
    }
}
