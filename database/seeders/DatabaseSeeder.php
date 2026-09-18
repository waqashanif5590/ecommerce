<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Creating admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'admin@123',
        ]);

        // Creating end users
        User::factory(10)->create();

        // Seeding the migrations
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            ProductVariantSeeder::class,
            ProductImageSeeder::class,
            CustomerReviewSeeder::class,
            CartSeeder::class,
            CartItemSeeder::class,
            WishlistSeeder::class,
        ]);
    }
}
