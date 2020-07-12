<?php

namespace App\Http\Controllers\API\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers',
            'phone' => 'required|unique:customers',
            'alt_phone' => 'sometimes|unique:customers',
            'password' => 'required',
            'area_id' => 'required',
            'address' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        return Customer::create($data);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . auth()->user()->id,
            'phone' => 'required|unique:customers,phone,' . auth()->user()->id,
            'alt_phone' => 'required|unique:customers,alt_phone,' . auth()->user()->id,
            'password' => 'sometimes',
            'area_id' => 'required',
            'address' => 'required',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        auth()->user()->update($data);

        return response()->json(auth()->user());
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        $customer = Customer::where('phone', $request->phone)->first();

        if (!$customer || !Hash::check($request->password, $customer->password)) {
            throw ValidationException::withMessages([
                'phone' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'customer' => $customer->only(['id', 'name', 'email', 'phone', 'area_id', 'address']),
            'token' => $customer->createToken('mobile')->plainTextToken
        ]);

    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json('Logged out');
    }
}
