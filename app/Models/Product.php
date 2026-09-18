<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)
            ->where('is_primary', true);
    }

    public function secondaryImages()
    {
        return $this->hasMany(ProductImage::class)
            ->where('is_primary', false);
    }

    public function getFormattedPriceAttribute()
    {
        return 'PKR ' . number_format($this->price);
    }

    public function getDiscountedPriceAttribute()
    {
        $discount = ($this->price * $this->total_discount) / 100;
        $discounted_price = $this->price - $discount;

        return $discounted_price;
    }
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating');
    }
}
