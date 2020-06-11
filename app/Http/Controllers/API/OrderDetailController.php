<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index(Order $order)
    {
        return response()->json($order->details);
    }
}
