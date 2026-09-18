<?php

namespace Database\Seeders;

use App\Models\Wishlist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path: 'database/json/wishlist.json');
        $products = collect(json_decode($json));
        $products->each(function ($product) {
            Wishlist::create([
                'user_id' => $product->user_id,
                'product_id' => $product->product_id,
            ]);
        });
    }
}
