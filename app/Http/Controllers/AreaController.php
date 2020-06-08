<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        Area::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Area created successfully'
        ]);
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
            'message' => 'Area updated successfully'
        ]);
    }
}
