<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'product_variant_id', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function getDiscountAmountAttribute()
    {
        $product = $this->productVariant->product;
        if (! $product->total_discount) {
            return 0;
        }

        return ($product->price * $product->total_discount / 100) * $this->quantity;
    }

    public function getTotalPriceAttribute()
    {
        return ($this->productVariant->product->price * $this->quantity) - $this->discount_amount;
    }
}
