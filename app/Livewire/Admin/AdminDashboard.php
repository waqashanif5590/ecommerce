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
    private function calculateGrowth($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
        return (($current - $previous) / $previous) * 100;
    }
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
        $low_stock_items = Product::whereHas('variants')
            ->withSum('variants', 'quantity')
            ->get()
            ->filter(fn($product) => $product->variants_sum_quantity < 10)
            ->count();

        $currentOrders = Order::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth(),
        ])->count();

        $previousOrders = Order::whereBetween('created_at', [
            now()->subMonth()->startOfMonth(),
            now()->subMonth()->endOfMonth(),
        ])->count();
        $ordersGrowth = $this->calculateGrowth($currentOrders, $previousOrders);

        $currentCustomers = User::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth(),
        ])->count();

        $previousCustomers = User::whereBetween('created_at', [
            now()->subMonth()->startOfMonth(),
            now()->subMonth()->endOfMonth(),
        ])->count();
        $customersGrowth = $this->calculateGrowth($currentCustomers, $previousCustomers);

        $totalRevenue = Order::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth(),
        ])->sum('total');
        return view('livewire.admin.admin-dashboard', compact([
            'orders',
            'total_orders',
            'new_customers',
            'low_stock_items',
            'ordersGrowth',
            'customersGrowth',
            'totalRevenue'
        ]));
    }
}
