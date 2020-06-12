<?php

namespace Tests\Feature\API;

use App\Customer;
use App\Order;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function customer_can_place_new_order()
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

    /**
     * @test
     */
    public function customer_can_place_order_and_stock_should_be_updated()
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

        $this->assertEquals(2, $product1->refresh()->stock);
        $this->assertEquals(5, $product2->refresh()->stock);
        $this->assertEquals(10, $product3->refresh()->stock);

        $orders = Order::all();
        $this->assertEquals(1, $orders->count());

        $details = $orders->first()->details;
        $this->assertEquals(3, $details->count());
    }

    /**
     * @test
     */
    public function should_through_exception_if_there_no_enough_stock()
    {
        $customer = factory(Customer::class)->create();

        $this->apiLogin($customer);

        $product1 = factory(Product::class)->create(['price' => 100, 'stock' => 5]);
        $product2 = factory(Product::class)->create(['price' => 250, 'stock' => 10]);
        $product3 = factory(Product::class)->create(['price' => 300, 'stock' => 20]);

        $cart = [
            'cart' => [
                ['id' => $product1->id, 'price' => $product1->price, 'quantity' => 10],
                ['id' => $product2->id, 'price' => $product2->price, 'quantity' => 15],
                ['id' => $product3->id, 'price' => $product3->price, 'quantity' => 40],
            ]
        ];

        try {
            $this->post('/api/orders', $cart);
        } catch (\Exception $exception) {
            $this->assertTrue($exception instanceof ValidationException);
        }

        $orders = Order::all();
        $this->assertEquals(0, $orders->count());

    }

    /**
     * @test
     */
    public function customer_can_get_order_details()
    {
        $customer = $this->apiLogin();

        $product1 = factory(Product::class)->create(['price' => 100, 'stock' => 5]);
        $product2 = factory(Product::class)->create(['price' => 250, 'stock' => 10]);
        $product3 = factory(Product::class)->create(['price' => 300, 'stock' => 20]);

        $cart = [
            ['id' => $product1->id, 'price' => $product1->price, 'quantity' => 3],
            ['id' => $product2->id, 'price' => $product2->price, 'quantity' => 5],
            ['id' => $product3->id, 'price' => $product3->price, 'quantity' => 10],
        ];

        $order = $customer->placeOrder($cart);

        $response = $this->get("/api/orders/$order->id/details");

        $response->assertJsonCount(3);

    }
}
