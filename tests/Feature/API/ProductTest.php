<?php

namespace Tests\Feature\API;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_get_all_products()
    {
        $this->apiLogin();

        factory(Product::class, 10)->create();

        $response = $this->get('/api/products');

        $response->assertJsonCount(10);

    }
}
