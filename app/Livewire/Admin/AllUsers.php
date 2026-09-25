<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class AllUsers extends Component
{
    public function render()
    {
        $total_orders = Order::count();
        $total_customers = User::count();
        $new_customers = User::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth(),
        ])->count();
        $customers_with_orders = User::has('orders')->count();
        $customers = User::withCount('orders as total_orders')
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.admin.all-users', compact([
            'total_orders',
            'total_customers',
            'new_customers',
            'customers_with_orders',
            'customers',
        ]));
    }
}
