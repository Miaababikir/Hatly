<?php

namespace Tests\Feature\Dashboard;

use App\Area;
use App\DeliveryMan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeliveryManControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_add_delivery_man()
    {
        $this->login();

        $area = factory(Area::class)->create();

        $this->post('/dashboard/delivery-men', [
            'name' => 'Jone Doe',
            'phone' => '09123456789',
            'alt_phone' => '09123456789',
            'address' => 'address',
            'area_id' => $area->id,
        ]);

        $this->assertDatabaseHas('delivery_men', [
            'name' => 'Jone Doe',
            'phone' => '09123456789',
            'alt_phone' => '09123456789',
            'address' => 'address',
            'area_id' => $area->id,
        ]);
    }

    /**
     * @test
     */
    public function can_update_delivery_man()
    {
        $this->login();

        $deliveryMan = factory(DeliveryMan::class)->create();

        $this->put("/dashboard/delivery-men/$deliveryMan->id", [
            'name' => 'Jone Doe',
            'phone' => '09123456789',
            'alt_phone' => '09123456789',
            'address' => 'address',
            'area_id' => $deliveryMan->area_id,
        ]);

        $this->assertDatabaseHas('delivery_men', [
            'name' => 'Jone Doe',
            'phone' => '09123456789',
            'alt_phone' => '09123456789',
            'address' => 'address',
            'area_id' => $deliveryMan->area_id,
        ]);
    }
}
