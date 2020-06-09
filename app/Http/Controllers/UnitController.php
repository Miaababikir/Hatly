<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();

        return inertia()->render('Dashboard/units/index', ['units' => $units]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/units/create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
            'short_name' => 'required',
            'short_name_ar' => 'required',
        ]);

        Unit::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم الاضافة بنجاح'
        ]);

        return redirect()->route('units.index');
    }

    public function edit(Unit $unit)
    {
        return inertia()->render('Dashboard/units/edit', ['area' => $unit]);
    }

    public function update(Request $request, Unit $unit)
    {
        $data = $request->validate([
            'name' => 'sometimes',
            'name_ar' => 'sometimes',
            'short_name' => 'sometimes',
            'short_name_ar' => 'sometimes',
        ]);

        $unit->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);

        return redirect()->route('units.index');

    }
}
