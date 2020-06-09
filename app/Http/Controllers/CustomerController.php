<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return inertia()->render('Dashboard/customers/index', ['customers' => $customers]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/customers/create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:customers',
            'password' => 'required',
            'area_id' => 'required',
            'address' => 'required',
        ]);

        Customer::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم الاضافة بنجاح'
        ]);

        return redirect()->route('customers.index');
    }

    public function edit(Customer $customer)
    {
        return inertia()->render('Dashboard/customers/edit', ['customer' => $customer]);
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => 'sometimes',
            'username' => 'sometimes|unique:customers,username,' . $customer->id,
            'password' => 'sometimes',
            'area_id' => 'sometimes',
            'address' => 'sometimes',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        $customer->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);

        return redirect()->route('customers.index');

    }
}
