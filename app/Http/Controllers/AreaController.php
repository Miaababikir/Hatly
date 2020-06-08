<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    public function index()
    {
        $areas = Area::all();

        return inertia()->render('Dashboard/areas/index', ['areas' => $areas]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/areas/create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        Area::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم الاضافة بنجاح'
        ]);

        return redirect()->route('areas.index');
    }

    public function edit(Area $area)
    {
        return inertia()->render('Dashboard/areas/edit', ['area' => $area]);
    }

    public function update(Request $request, Area $area)
    {
        $data = $request->validate([
            'name' => 'sometimes',
            'name_ar' => 'sometimes',
        ]);

        $area->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);

        return redirect()->route('areas.index');

    }
}
