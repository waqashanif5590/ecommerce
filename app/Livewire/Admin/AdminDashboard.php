<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class AdminDashboard extends Component
{
    public function render()
    {
        $user = User::find(Auth::id());
        if ($user->role != 'admin') {
            $this->redirectRoute('/');
        }
        $orders = Order::orderBy('created_at', 'desc')->take(3)->get();
        $total_orders = Order::count();
        $new_customers = User::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth(),
        ])->count();
        $low_stock_items = Product::whereHas('variants', function ($query) {
            $query->where('quantity', '<', 10);
        })->count();

        return view('livewire.admin.admin-dashboard', compact(['orders', 'total_orders', 'new_customers', 'low_stock_items']));
    }
}
