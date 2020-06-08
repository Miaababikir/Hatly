<?php

namespace Tests\Feature\Dashboard;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    */
     public function can_add_category()
    {
        $this->login();

        $this->post('/dashboard/categories', [
            'name' => 'Category name',
            'name_ar' => 'Category name ar',
        ]);

        $this->assertDatabaseHas('categories', ['name' => 'Category name', 'name_ar' => 'Category name ar']);
    }

    /**
    * @test
    */
     public function can_update_category()
    {
        $this->login();

        $category = factory(Category::class)->create();

        $this->put("/dashboard/categories/$category->id", [
            'name' => 'Category name',
            'name_ar' => 'Category name ar',
        ]);

        $this->assertDatabaseHas('categories', ['name' => 'Category name', 'name_ar' => 'Category name ar']);
    }
}
