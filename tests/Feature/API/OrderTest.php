<?php

namespace Tests\Feature\API;

use App\Customer;
use App\Order;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_place_new_order()
    {
        $customer = factory(Customer::class)->create();

        $this->apiLogin($customer);

        $product1 = factory(Product::class)->create(['price' => 100, 'stock' => 5]);
        $product2 = factory(Product::class)->create(['price' => 250, 'stock' => 10]);
        $product3 = factory(Product::class)->create(['price' => 300, 'stock' => 20]);

        $cart = [
            'cart' => [
                ['id' => $product1->id, 'price' => $product1->price, 'quantity' => 3],
                ['id' => $product2->id, 'price' => $product2->price, 'quantity' => 5],
                ['id' => $product3->id, 'price' => $product3->price, 'quantity' => 10],
            ]
        ];

        $this->post('/api/orders', $cart);

        $orders = Order::all();
        $this->assertEquals(1, $orders->count());

        $details = $orders->first()->details;

        $this->assertEquals(3, $details->count());

    }
}
