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
            'password' => 'required',
            'area_id' => 'required',
            'address' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        return Customer::create($data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if (! $customer || ! Hash::check($request->password, $customer->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'customer' => $customer->only(['id', 'name', 'email', 'area_id', 'address']),
            'token' => $customer->createToken('mobile')->plainTextToken
        ]);

    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json('Logged out');
    }
}
