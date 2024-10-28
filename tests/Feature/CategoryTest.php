<?php

namespace Tests\Feature;

use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function testCategory()
    {
        $this->seed([CategorySeeder::class]);
        $category = Category::query()->first();
        $response = $this->get("/api/categories/$category->id");

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $category->id,
                    'name' => $category->name,
                    'created_at' => $category->created_at->toJSON(),
                    'updated_at' => $category->updated_at->toJSON(),
                ],
            ]);
    }
}
