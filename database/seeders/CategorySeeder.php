<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path: 'database/json/categories.json');
        $categories = collect(json_decode($json));
        $categories->each(function ($category) {
            Category::create([
                'title' => $category->title,
                'description' => $category->description,
                'slug' => $category->slug,
                'image' => $category->image,
            ]);
        });
    }
}
