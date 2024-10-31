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
    public function testCategoryResourceCollection()
    {
        $this->seed([CategorySeeder::class]);
        $category = Category::all();

        $this->get("/api/categories")
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'id' => $category[0]->id,
                        'name' => $category[0]->name,
                        'created_at' => $category[0]->created_at->toJSON(),
                        'updated_at' => $category[0]->updated_at->toJSON(),
                    ],
                    [
                        'id' => $category[1]->id,
                        'name' => $category[1]->name,
                        'created_at' => $category[1]->created_at->toJSON(),
                        'updated_at' => $category[1]->updated_at->toJSON(),
                    ],
                ],
            ]);
    }
    public function testCategoryResourceCollectionCustom()
    {
        $this->seed([CategorySeeder::class]);
        $category = Category::all();

        $this->get("/api/categories-custom")
            ->assertStatus(200)
            ->assertJson([
                'total' => 2,
                'data' => [
                    [
                        'id' => $category[0]->id,
                        'name' => $category[0]->name,

                    ],
                    [
                        'id' => $category[1]->id,
                        'name' => $category[1]->name,

                    ],
                ],
            ]);
}

}
