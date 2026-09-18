<?php

namespace App\Livewire\User;

use App\Models\Address;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class UserDashboard extends Component
{
    public function render()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->orderBy('created_at', 'desc')->take(4)->get();
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->take(3)->get();
        $address = Address::where('is_default', true)->where('user_id', Auth::id())->first();

        return view('livewire.user.user-dashboard', compact(['wishlists', 'orders', 'address']));
    }
}
