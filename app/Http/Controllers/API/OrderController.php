<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = auth()->user()->orders;

        return response()->json($orders);
    }

    public function store(Request $request)
    {

        $order = auth()->user()->placeOrder($request->cart);

        return response()->json($order);
    }
}
