<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn() => redirect()->route('dashboard.index'));

Auth::routes(['register' => false, 'confirm' => false, 'reset' => false]);


Route::middleware('auth')->prefix('/dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/ui', 'DashboardController@ui');

    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('/categories', 'CategoryController@store')->name('categories.store');
    Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::put('/categories/{category}', 'CategoryController@update')->name('categories.update');

    Route::get('/areas', 'AreaController@index')->name('areas.index');
    Route::get('/areas/create', 'AreaController@create')->name('areas.create');
    Route::post('/areas', 'AreaController@store')->name('areas.store');
    Route::get('/areas/{area}/edit', 'AreaController@edit')->name('areas.edit');
    Route::put('/areas/{area}', 'AreaController@update')->name('areas.update');

    Route::get('/units', 'UnitController@index')->name('units.index');
    Route::get('/units/create', 'UnitController@create')->name('units.create');
    Route::post('/units', 'UnitController@store')->name('units.store');
    Route::get('/units/{unit}/edit', 'UnitController@edit')->name('units.edit');
    Route::put('/units/{unit}', 'UnitController@update')->name('units.update');

});
