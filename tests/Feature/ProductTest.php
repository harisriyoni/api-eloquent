<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotNull;

class ProductTest extends TestCase
{
    public function test_products(): void
    {
        $product = Product::query()->first();
        $this->get("/api/products/$product->id")
        ->assertStatus(200)
        ->assertJson([
            "values" => [
                "id" => $product->id,
                "name" => $product->name,
                "category" => [
                    "id" => $product->category->id,
                    "name" => $product->category->name,
                ],
                "price" => $product->price,
                "di buat" => $product->created_at->toJson(),
                "di update" => $product->updated_at->toJson(),
            ]
        ]);
    }
    public function test_pagging(){
        $response = $this->get('/api/products-paging')
        ->assertStatus(200);
        $this->assertNotNull($response->json("links"));
        $this->assertNotNull($response->json("meta"));
        $this->assertNotNull($response->json("data"));
    }
}
