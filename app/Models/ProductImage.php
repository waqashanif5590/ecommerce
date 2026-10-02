<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image',
        'is_primary',
        'sort_order',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopePrimary(Builder $query)
    {
        return $query->where('is_primary', true);
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
