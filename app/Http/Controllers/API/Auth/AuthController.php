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
            'username' => 'required|unique:customers',
            'phone' => 'required|unique:customers',
            'password' => 'required',
            'area_id' => 'required',
            'address' => 'required',
        ]);

        return Customer::create($data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $customer = Customer::where('username', $request->username)->first();

        if (! $customer || ! Hash::check($request->password, $customer->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'username' => $customer->username,
            'token' => $customer->createToken('mobile')->plainTextToken
        ]);

    }
}
