<?php

namespace Tests\Feature\API\Auth;

use App\Area;
use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    */
     public function can_register_new_customer()
    {
        $area = factory(Area::class)->create();

        $this->post('/api/register', [
            'name' => 'Jone Doe',
            'email' => 'test@test.com',
            'password' => 'password',
            'phone' => '09123456789',
            'alt_phone' => '09123456789',
            'address' => 'address',
            'area_id' => $area->id,
        ]);

        $this->assertDatabaseHas('customers', [
            'name' => 'Jone Doe',
            'email' => 'test@test.com',
        ]);
    }

    /**
     * @test
     */
    public function can_login_customer_and_issue_token()
    {
        $customer = factory(Customer::class)->create([
            'phone' => '09123456789',
        ]);

        $response = $this->post('/api/login', [
            'phone' => '09123456789',
            'password' => 'password',
        ]);

        $customer = Customer::first();

        $response->assertJson([
            'customer' => $customer->only(['id', 'name', 'email', 'phone', 'area_id', 'address']),
        ]);

    }

    /**
    * @test
    */
     public function can_logout_customer_and_delete_his_token()
    {
        $customer = factory(Customer::class)->create([
            'phone' => '09123456789',
        ]);

        Sanctum::actingAs(
            $customer,
            ['*']
        );

        $customer->createToken('mobile');

        $this->post('/api/logout');

        $this->assertCount(0, $customer->tokens);
    }
}
