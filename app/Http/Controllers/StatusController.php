<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        return inertia()->render('Dashboard/statuses/index', ['statuses' => $statuses]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/statuses/create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        Status::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم الاضافة بنجاح'
        ]);

        return redirect()->route('statuses.index');
    }

    public function edit(Status $status)
    {
        return inertia()->render('Dashboard/statuses/edit', ['status' => $status]);
    }

    public function update(Request $request, Status $status)
    {
        $data = $request->validate([
            'name' => 'sometimes',
            'name_ar' => 'sometimes',
        ]);

        $status->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);

        return redirect()->route('statuses.index');

    }
}
