<?php

namespace Tests\Feature\API;

use App\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeliveryFeeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_get_delivery_fees()
    {
        $this->apiLogin();

        $response = $this->get('/api/delivery-fees');

        $response->assertJson(['deliveryFee' => Order::DELIVERY_FEES]);

    }
}
