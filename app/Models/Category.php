<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Category extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getImageUrlAttribute(): string
    {
        $imagePath = str_starts_with($this->image, 'images/')
            ? $this->image
            : 'images/'.$this->image;

        if (Storage::disk('public')->exists($imagePath)) {
            return Storage::disk('public')->url($imagePath);
        }

        return asset($imagePath);
    }
}
