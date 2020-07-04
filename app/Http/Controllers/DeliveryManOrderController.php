<?php

namespace App\Http\Controllers;

use App\DeliveryMan;
use App\Order;
use Illuminate\Http\Request;

class DeliveryManOrderController extends Controller
{
    public function store(Request $request, DeliveryMan $deliveryMan)
    {
        $data = $request->validate([
            'orders' => 'required',
        ]);

        foreach ($data['orders'] as $order) {
            Order::find($order)->update(['delivery_man_id' => $deliveryMan->id]);
        }

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم الاضافة بنجاح'
        ]);

        return redirect()->back();
    }
}
