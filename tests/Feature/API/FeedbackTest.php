<?php

namespace Tests\Feature\API;

use App\Feedback;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function customer_can_get_all_his_feedback()
    {
        $customer = $this->apiLogin();

        factory(Feedback::class, 3)->create(['customer_id' => $customer->id]);

        $response = $this->get("/api/feedback");

        $response->assertJsonCount(3);
    }

    /**
    * @test
    */
     public function customer_can_submit_a_feedback()
    {
        $this->apiLogin();

        $this->post("/api/feedback", [
            'message' => 'Message body'
        ]);

        $this->assertDatabaseHas('feedback', ['message' => 'Message body']);
    }

}
