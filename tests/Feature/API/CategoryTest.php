<?php

namespace Tests\Feature\API;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    */
     public function customer_can_get_all_categories()
    {
        $this->apiLogin();

        factory(Category::class, 10)->create();

        $response = $this->get('/api/categories');

        $response->assertJsonCount(10);

    }

}
