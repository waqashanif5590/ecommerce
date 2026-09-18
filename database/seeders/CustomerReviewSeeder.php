<?php

namespace Database\Seeders;

use App\Models\CustomerReview;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CustomerReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path: 'database/json/customer_reviews.json');
        $reviews = collect(json_decode($json));
        $reviews->each(function ($review) {
            CustomerReview::create([
                'user_id' => $review->user_id,
                'rating' => $review->rating,
                'comment' => $review->comment,
                'status' => $review->status,
            ]);
        });
    }
}
