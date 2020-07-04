<?php

namespace App\Http\Controllers;

use App\DeliveryMan;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->orderByDesc('id')
            ->paginate(10);

        $notDeliveredOrders = Order::has('deliveryMan', 0)->where('delivered', false)->get();

        $deliveryMen = DeliveryMan::all();

        return inertia()->render('Dashboard/orders/index', [
            'orders' => $orders,
            'notDeliveredOrders' => $notDeliveredOrders,
            'deliveryMen' => $deliveryMen
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
