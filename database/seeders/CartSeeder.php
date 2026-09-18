<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path: 'database/json/carts.json');
        $carts = collect(json_decode($json));
        $carts->each(function ($cart) {
            Cart::create([
                'user_id' => $cart->user_id,
            ]);
        });
    }
}
