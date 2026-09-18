<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path: 'database/json/products.json');
        $products = collect(json_decode($json));
        $products->each(function ($product) {
            Product::create([
                'category_id' => $product->category_id,
                'name' => $product->name,
                'slug' => $product->slug,
                'description' => $product->description,
                'price' => $product->price,
                'total_discount' => $product->total_discount,
                'badge' => $product->badge,
                'is_new' => $product->is_new,
                'status' => $product->status,
            ]);
        });
    }
}
