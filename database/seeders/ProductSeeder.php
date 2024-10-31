<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $product = new Product();
       $cate = Category::first();
       $product->name = 'makanan';
       $product->category_id = $cate->id;
       $product->save();

    }
}
