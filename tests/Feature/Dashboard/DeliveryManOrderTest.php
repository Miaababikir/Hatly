<?php

namespace Tests\Feature\Dashboard;

use App\DeliveryMan;
use App\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeliveryManOrderTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    */
     public function can_assign_orders_to_delivery_man()
    {
        $this->login();

        $deliveryMan = factory(DeliveryMan::class)->create();

        $data['orders'] = factory(Order::class, 10)->create()->pluck('id')->toArray();

        $this->post("/dashboard/delivery-men/$deliveryMan->id/orders", $data);

        $this->assertDatabaseHas('orders', ['delivery_man_id' => $deliveryMan->id]);

    }
}
