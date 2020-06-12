<?php

namespace Tests\Feature\API;

use App\Area;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AreaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function customer_can_get_all_areas()
    {
        $this->apiLogin();

        factory(Area::class, 10)->create();

        $response = $this->get('/api/areas');

        $response->assertJsonCount(11);

    }
}
