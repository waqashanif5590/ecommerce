<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class ReportsAnalytics extends Component
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
        $totalOrders = Order::count();

        $orderCompleted = Order::where('status', 'completed')->count();
        $orderPending = Order::where('status', 'pending')->count();
        $orderCancelled = Order::where('status', 'cancelled')->count();



        $new_customers = User::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth(),
        ])->count();

        $lowStocks = Product::whereHas('variants')
            ->withSum('variants', 'quantity')
            ->get()
            ->filter(function ($product) {
                return $product->variants_sum_quantity < 10;
            });

        $low_stock_items = $lowStocks->count();

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

        $previousRevenue = Order::whereBetween('created_at', [
            now()->subMonth()->startOfMonth(),
            now()->subMonth()->endOfMonth(),
        ])->sum('total');
        $revenueGrowth = $this->calculateGrowth($totalRevenue, $previousRevenue);

        $topSellingProducts = OrderItem::query()
            ->select('product_id')
            ->selectRaw('SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->limit(4)->get();

        $customers = User::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth(),
        ])->withCount('orders as totalOrders')
            ->orderByDesc('totalOrders')
            ->take(4)->get();

        $average_order_value = Order::where('status', 'completed')
            ->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->avg('total') ?? 0;

        $previousAverageOrderValue = Order::where('status', 'completed')
            ->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])
            ->avg('total') ?? 0;
        $averageOrderValueGrowth = $this->calculateGrowth($average_order_value, $previousAverageOrderValue);

        // Categories performance
        $categoryPerformace = OrderItem::query()
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->select(
                'categories.id',
                'categories.title',
            )
            ->selectRaw('SUM(order_items.quantity) as total_sold')
            ->selectRaw('COUNT(DISTINCT order_items.order_id) as total_orders')
            ->groupBy(
                'categories.id',
                'categories.title',
            )
            ->orderByDesc('total_sold')
            ->get();

        $totalSold = $categoryPerformace->sum('total_sold');

        $categoryPerformace = $categoryPerformace->map(function ($category) use ($totalSold) {
            $category->percentage = $totalSold > 0
                ? round(($category->total_sold / $totalSold) * 100, 1)
                : 0;

            return $category;
        })->take(4);
        return view('livewire.admin.reports-analytics', compact([
            'totalOrders',
            'new_customers',
            'low_stock_items',
            'totalRevenue',
            'ordersGrowth',
            'customersGrowth',
            'revenueGrowth',
            'average_order_value',
            'averageOrderValueGrowth',
            'topSellingProducts',
            'customers',
            'lowStocks',
            'orderCompleted',
            'orderPending',
            'orderCancelled',
            'categoryPerformace',
        ]));
    }
}
