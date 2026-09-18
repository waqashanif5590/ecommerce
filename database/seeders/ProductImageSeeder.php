<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path: 'database/json/product_images.json');
        $images = collect(json_decode($json));

        $images->each(function ($image) {
            ProductImage::create([
                'product_id' => $image->product_id,
                'image' => $image->image,
                'is_primary' => $image->is_primary,
                'sort_order' => $image->sort_order,
            ]);
        });
    }
}
