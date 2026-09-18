<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function getEstimatedDeliveryAttribute()
    {
        return $this->payment->method === 'cod' ? $this->created_at->addDays(7) : $this->created_at->addDays(3);
    }
}
