<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_products(): void
    {
        $product = Product::query()->first();
        $this->get("/api/products/$product->id")
        ->assertStatus(200)
        ->assertJson([
            "values"=>[
                "name" => $product->name,
                "category" => [
                    "id" => $product->category->id,
                    "name" => $product->category->name,
                ],
                "price" => $product->price,
                "di_buat" => $product->created_at,
                "di_update" => $product->updated_at,
            ]
        ]);
    }
}
