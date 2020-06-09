<?php

namespace Tests\Feature\Dashboard;

use App\Area;
use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_add_customer()
    {
        $this->login();

        $area = factory(Area::class)->create();

        $this->post('/dashboard/customers', [
            'name' => 'Jone Doe',
            'username' => 'jonedoe',
            'password' => 'password',
            'address' => 'address',
            'area_id' => $area->id,
        ]);

        $this->assertDatabaseHas('customers', [
            'name' => 'Jone Doe',
            'username' => 'jonedoe',
            'address' => 'address',
            'area_id' => $area->id,
        ]);
    }

    /**
     * @test
     */
    public function can_update_customer()
    {
        $this->login();

        $customer = factory(Customer::class)->create();

        $this->put("/dashboard/customers/$customer->id", [
            'name' => 'Jone Doe',
            'username' => 'jonedoe',
            'password' => 'password',
            'address' => 'address',
            'area_id' => $customer->area_id,
        ]);

        $this->assertDatabaseHas('customers', [
            'name' => 'Jone Doe',
            'username' => 'jonedoe',
            'address' => 'address',
            'area_id' => $customer->area_id,
        ]);
    }
}
