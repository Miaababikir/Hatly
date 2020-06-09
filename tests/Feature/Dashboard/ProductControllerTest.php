<?php

namespace Tests\Feature\Dashboard;

use App\Category;
use App\Product;
use App\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_add_product()
    {
        $this->login();

        $category = factory(Category::class)->create();
        $unit = factory(Unit::class)->create();

        $this->post('/dashboard/products', [
            'name' => 'Product name',
            'name_ar' => 'Product name ar',
            'category_id' => $category->id,
            'unit_id' => $unit->id,
            'price' => 250,
            'stock' => 10,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Product name',
            'name_ar' => 'Product name ar',
            'category_id' => $category->id,
            'unit_id' => $unit->id,
            'price' => 250,
            'stock' => 10,
        ]);
    }

    /**
     * @test
     */
    public function can_update_product()
    {
        $this->login();

        $category = factory(Category::class)->create();
        $unit = factory(Unit::class)->create();
        $product = factory(Product::class)->create();

        $this->put("/dashboard/products/$product->id", [
            'name' => 'Product name',
            'name_ar' => 'Product name ar',
            'category_id' => $category->id,
            'unit_id' => $unit->id,
            'price' => 250,
            'stock' => 10,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Product name',
            'name_ar' => 'Product name ar',
            'category_id' => $category->id,
            'unit_id' => $unit->id,
            'price' => 250,
            'stock' => 10,
        ]);
    }

}
