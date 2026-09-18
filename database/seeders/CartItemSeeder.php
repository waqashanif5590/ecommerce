<?php

namespace Database\Seeders;

use App\Models\CartItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path: 'database/json/cart_items.json');
        $items = collect(json_decode($json));
        $items->each(function ($item) {
            CartItem::create([
                'cart_id' => $item->cart_id,
                'product_variant_id' => $item->product_variant_id,
                'quantity' => $item->quantity,
            ]);
        });
    }
}
