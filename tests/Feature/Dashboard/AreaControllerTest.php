<?php

namespace Tests\Feature\Dashboard;

use App\Area;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AreaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_add_area()
    {
        $this->login();

        $this->post('/dashboard/areas', [
            'name' => 'Area name',
            'name_ar' => 'Area name ar',
        ]);

        $this->assertDatabaseHas('areas', ['name' => 'Area name', 'name_ar' => 'Area name ar']);
    }

    /**
     * @test
     */
    public function can_update_area()
    {
        $this->login();

        $area = factory(Area::class)->create();

        $this->put("/dashboard/areas/$area->id", [
            'name' => 'Area name',
            'name_ar' => 'Area name ar',
        ]);

        $this->assertDatabaseHas('areas', ['name' => 'Area name', 'name_ar' => 'Area name ar']);
    }
}
