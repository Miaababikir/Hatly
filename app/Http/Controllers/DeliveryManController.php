<?php

namespace App\Http\Controllers;

use App\Area;
use App\DeliveryMan;
use Illuminate\Http\Request;

class DeliveryManController extends Controller
{
    public function index()
    {
        $deliveryMan = DeliveryMan::all();

        return inertia()->render('Dashboard/deliveryMen/index', ['deliveryMen' => $deliveryMan]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/deliveryMen/create', [
            'areas' => Area::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:delivery_men',
            'alt_phone' => 'required|unique:delivery_men',
            'area_id' => 'required',
            'address' => 'required',
        ]);

        DeliveryMan::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم الاضافة بنجاح'
        ]);

        return redirect()->route('deliveryMen.index');
    }

    public function edit(DeliveryMan $deliveryMan)
    {
        return inertia()->render('Dashboard/deliveryMen/edit', [
            'deliveryMan' => $deliveryMan,
            'areas' => Area::all(),
        ]);
    }

    public function update(Request $request, DeliveryMan $deliveryMan)
    {
        $data = $request->validate([
            'name' => 'sometimes',
            'phone' => 'sometimes|unique:delivery_men,phone,' . $deliveryMan->id,
            'alt_phone' => 'sometimes|unique:delivery_men,alt_phone,' . $deliveryMan->id,
            'area_id' => 'sometimes',
            'address' => 'sometimes',
        ]);

        $deliveryMan->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);

        return redirect()->route('deliveryMen.index');

    }
}
