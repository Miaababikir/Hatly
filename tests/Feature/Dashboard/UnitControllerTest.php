<?php

namespace Tests\Feature\Dashboard;

use App\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UnitControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_add_unit()
    {
        $this->login();

        $this->post('/dashboard/units', [
            'name' => 'Unit name',
            'name_ar' => 'Unit name ar',
            'short_name' => 'Unit short name',
            'short_name_ar' => 'Unit short name ar',
        ]);

        $this->assertDatabaseHas('units', ['name' => 'Unit name', 'short_name_ar' => 'Unit short name ar']);
    }

    /**
     * @test
     */
    public function can_update_unit()
    {
        $this->login();

        $unit = factory(Unit::class)->create();

        $this->put("/dashboard/units/$unit->id", [
            'name' => 'Unit updated name',
            'name_ar' => 'Unit name ar',
            'short_name' => 'Unit short name',
            'short_name_ar' => 'Unit updated short name ar',
        ]);

        $this->assertDatabaseHas('units', [
            'name' => 'Unit updated name',
            'name_ar' => 'Unit name ar',
            'short_name' => 'Unit short name',
            'short_name_ar' => 'Unit updated short name ar',
        ]);
    }
}
