<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Register => Done
// Login => Done
// Verification
// Forget password
// Categories
// Products
// Areas
// Place order
// Delivery price
// Order Details
// Feedback
// Invite friend
// Edit profile

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'API\Auth\AuthController@login');
Route::post('/register', 'API\Auth\AuthController@register');

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', 'API\Auth\AuthController@logout');

});
