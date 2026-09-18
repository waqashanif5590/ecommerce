<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path: 'database/json/product_variants.json');
        $product_variants = collect(json_decode($json));
        $product_variants->each(function ($product) {
            ProductVariant::create([
                'product_id' => $product->product_id,
                'size' => $product->size,
                'color' => $product->color,
                'quantity' => $product->quantity,
            ]);
        });
    }
}
