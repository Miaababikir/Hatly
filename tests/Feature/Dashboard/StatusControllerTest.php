<?php

namespace Tests\Feature\Dashboard;

use App\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatusControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_add_status()
    {
        $this->login();

        $this->post('/dashboard/statuses', [
            'name' => 'Status name',
            'name_ar' => 'Status name ar',
        ]);

        $this->assertDatabaseHas('statuses', ['name' => 'Status name', 'name_ar' => 'Status name ar']);
    }

    /**
     * @test
     */
    public function can_update_status()
    {
        $this->login();

        $status = factory(Status::class)->create();

        $this->put("/dashboard/statuses/$status->id", [
            'name' => 'Status name',
            'name_ar' => 'Status name ar',
        ]);

        $this->assertDatabaseHas('statuses', ['name' => 'Status name', 'name_ar' => 'Status name ar']);
    }
}
