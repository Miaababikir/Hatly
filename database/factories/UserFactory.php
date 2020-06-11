<?php

/** @var Factory $factory */

use App\Area;
use App\Category;
use App\Customer;
use App\Order;
use App\Product;
use App\Status;
use App\Unit;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'name_ar' => $faker->name,
    ];
});

$factory->define(Area::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'name_ar' => $faker->name,
    ];
});

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'name_ar' => $faker->name,
        'short_name' => $faker->name,
        'short_name_ar' => $faker->name,
    ];
});

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'phone' => $faker->phoneNumber,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'address' => $faker->address,
        'area_id' => fn() =>  \factory(Area::class)->create(),
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'name_ar' => $faker->name,
        'category_id' => fn() =>  \factory(Category::class)->create(),
        'unit_id' => fn() =>  \factory(Unit::class)->create(),
        'price' => 100,
        'stock' => 10,
    ];
});

$factory->define(Order::class, function (Faker $faker) {
    return [
        'customer_id' => fn() =>  \factory(Customer::class)->create(),
    ];
});

