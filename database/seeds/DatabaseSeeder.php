<?php

use App\Area;
use App\Customer;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        factory(Customer::class)->create([
            'email' => 'test@test.com',
        ]);

        factory(Area::class)->create([
            'name' => 'Khartoum',
            'name_ar' => 'الخرطوم'
        ]);

        factory(Area::class)->create([
            'name' => 'Bahri',
            'name_ar' => 'بحري'
        ]);

        factory(Area::class)->create([
            'name' => 'Omdurman',
            'name_ar' => 'امدرمان'
        ]);

        factory(Product::class, 20)->create();

    }
}
