<?php

use App\Area;
use App\Customer;
use App\DeliveryMan;
use App\Order;
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
            'area_id' => 1
        ]);

        factory(DeliveryMan::class, 5)->create([
            'area_id' => 1
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

        $products = factory(Product::class, 20)->create();

        $orders = factory(Order::class, 20)->create(['customer_id' => 1]);

        foreach ($orders as $order) {
            $product = $products->random(1)->first();
            $order->details()->create([
                'product_id' => $product->id,
                'quantity' => 2,
                'price' => $product->price
            ]);
        }

    }
}
