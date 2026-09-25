<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'activity_type'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    public $fillable = ['phone'];

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function reviews()
    {
        return $this->hasMany(CustomerReview::class);
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function getUserFirstNameAttribute()
    {
        $fullname = $this->name;
        $first_name = strstr($fullname, ' ', true);

        return $first_name;
    }

    public function getUserTotalOrdersAttribute()
    {
        return $this->orders->count();
    }

    public function getUserPendingOrdersAttribute()
    {
        return $this->orders()->where('status', '!=', 'completed')->count();
    }

    public function getUserCompletedOrdersAttribute()
    {
        return $this->orders()->where('status', 'completed')->count();
    }

    public function getUserCancelledOrdersAttribute()
    {
        return $this->orders()->where('status', 'cancelled')->count();
    }

    public function getUserWishlistsAttribute()
    {
        return $this->wishlists->count();
    }

    public function getUserNameFirstLetters()
    {
        $name = $this->name;
        $splitName = explode(' ', $name);

        return ucfirst($splitName[0][0]).ucfirst($splitName[1][0]);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
