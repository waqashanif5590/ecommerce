<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.app')]
class ReportsAnalytics extends Component
{
    public string $rangePreset = 'this_month';

    public string $startDate;

    public string $endDate;

    #[Locked]
    public string $filterStartDate;

    #[Locked]
    public string $filterEndDate;

    public function mount(): void
    {
        $this->startDate = now()->startOfMonth()->toDateString();
        $this->endDate = now()->endOfMonth()->toDateString();
        $this->filterStartDate = $this->startDate;
        $this->filterEndDate = $this->endDate;
    }

    public function updatedRangePreset(): void
    {
        $today = CarbonImmutable::today();
        $previousMonth = $today->startOfMonth()->subMonth();

        [$startDate, $endDate] = match ($this->rangePreset) {
            'today' => [$today, $today],
            'last_7_days' => [$today->subDays(6), $today],
            'last_30_days' => [$today->subDays(29), $today],
            'last_month' => [$previousMonth->startOfMonth(), $previousMonth->endOfMonth()],
            'this_year' => [$today->startOfYear(), $today],
            'custom' => [null, null],
            default => [$today->startOfMonth(), $today->endOfMonth()],
        };

        if ($startDate === null || $endDate === null) {
            return;
        }

        $this->startDate = $startDate->toDateString();
        $this->endDate = $endDate->toDateString();
        $this->applyDateRange();
    }

    public function applyDateRange(): void
    {
        $validated = $this->validate([
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after_or_equal:startDate'],
        ]);

        $this->filterStartDate = CarbonImmutable::parse($validated['startDate'])->toDateString();
        $this->filterEndDate = CarbonImmutable::parse($validated['endDate'])->toDateString();
    }

    private function calculateGrowth(int|float $current, int|float $previous): float
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }

        return (($current - $previous) / $previous) * 100;
    }

    public function render(): View
    {
        $user = User::find(Auth::id());
        if ($user->role != 'admin') {
            $this->redirectRoute('/');
        }

        $startDate = CarbonImmutable::parse($this->filterStartDate)->startOfDay();
        $endDate = CarbonImmutable::parse($this->filterEndDate)->endOfDay();
        $filterStartDate = $this->filterStartDate;
        $filterEndDate = $this->filterEndDate;
        $dateRange = [$startDate, $endDate];
        $periodDays = (int) $startDate->startOfDay()->diffInDays($endDate->startOfDay()) + 1;
        $previousStartDate = $startDate->subDays($periodDays);
        $previousEndDate = $startDate->subMicrosecond();
        $previousDateRange = [$previousStartDate, $previousEndDate];

        $totalOrders = Order::whereBetween('created_at', $dateRange)->count();
        $orderCompleted = Order::where('status', 'completed')->whereBetween('created_at', $dateRange)->count();
        $orderPending = Order::where('status', 'pending')->whereBetween('created_at', $dateRange)->count();
        $orderCancelled = Order::where('status', 'cancelled')->whereBetween('created_at', $dateRange)->count();

        $new_customers = User::whereBetween('created_at', $dateRange)->count();
        $previousCustomers = User::whereBetween('created_at', $previousDateRange)->count();
        $customersGrowth = $this->calculateGrowth($new_customers, $previousCustomers);

        $lowStocks = Product::whereHas('variants')
            ->withSum('variants', 'quantity')
            ->get()
            ->filter(function ($product) {
                return $product->variants_sum_quantity < 10;
            });
        $low_stock_items = $lowStocks->count();

        $currentOrders = $totalOrders;
        $previousOrders = Order::whereBetween('created_at', $previousDateRange)->count();
        $ordersGrowth = $this->calculateGrowth($currentOrders, $previousOrders);

        $totalRevenue = Order::whereBetween('created_at', $dateRange)->sum('total');
        $previousRevenue = Order::whereBetween('created_at', $previousDateRange)->sum('total');
        $revenueGrowth = $this->calculateGrowth($totalRevenue, $previousRevenue);

        $topSellingProducts = OrderItem::query()
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereBetween('orders.created_at', $dateRange)
            ->select('order_items.product_id')
            ->selectRaw('SUM(order_items.quantity) as total_sold')
            ->groupBy('order_items.product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->limit(4)
            ->get();

        $average_order_value = Order::where('status', 'completed')
            ->whereBetween('created_at', $dateRange)
            ->avg('total') ?? 0;
        $previousAverageOrderValue = Order::where('status', 'completed')
            ->whereBetween('created_at', $previousDateRange)
            ->avg('total') ?? 0;
        $averageOrderValueGrowth = $this->calculateGrowth($average_order_value, $previousAverageOrderValue);

        $categoryPerformace = OrderItem::query()
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 'completed')
            ->whereBetween('orders.created_at', $dateRange)
            ->select('categories.id', 'categories.title')
            ->selectRaw('SUM(order_items.quantity) as total_sold')
            ->selectRaw('COUNT(DISTINCT order_items.order_id) as total_orders')
            ->groupBy('categories.id', 'categories.title')
            ->orderByDesc('total_sold')
            ->get();

        $totalSold = $categoryPerformace->sum('total_sold');
        $categoryPerformace = $categoryPerformace->map(function ($category) use ($totalSold) {
            $category->percentage = $totalSold > 0
                ? round(($category->total_sold / $totalSold) * 100, 1)
                : 0;

            return $category;
        })->take(4);

        $cityOrders = Order::query()
            ->whereBetween('created_at', $dateRange)
            ->select('shipping_city')
            ->selectRaw('COUNT(*) as order_count')
            ->groupBy('shipping_city')
            ->orderByDesc('order_count')
            ->get();
        $totalCityOrders = $cityOrders->sum('order_count');
        $topCity = $cityOrders->map(function ($city) use ($totalCityOrders) {
            $city->percentage = $totalCityOrders > 0
                ? round(($city->order_count / $totalCityOrders) * 100, 1)
                : 0;

            return $city;
        })->first() ?? (object) [
            'shipping_city' => 'No data',
            'percentage' => 0,
        ];

        $customerOrderStats = Order::where('status', 'completed')
            ->whereBetween('created_at', $dateRange)
            ->select('user_id')
            ->selectRaw('COUNT(*) as order_count')
            ->groupBy('user_id')
            ->get();
        $totalCustomers = $customerOrderStats->count();
        $repeatedCustomers = $customerOrderStats->where('order_count', '>', 1)->count();
        $repeatPurchaseRate = $totalCustomers > 0
            ? round(($repeatedCustomers / $totalCustomers) * 100, 1)
            : 0;

        $currentCustomers = Order::where('status', 'completed')
            ->whereBetween('created_at', $dateRange)
            ->distinct()
            ->pluck('user_id');
        $totalCurrentCustomers = $currentCustomers->count();
        $returningCustomers = $currentCustomers->filter(function ($userId) use ($startDate) {
            return Order::where('user_id', $userId)
                ->where('status', 'completed')
                ->where('created_at', '<', $startDate)
                ->exists();
        })->count();
        $returningCustomersRate = $totalCurrentCustomers > 0
            ? round(($returningCustomers / $totalCurrentCustomers) * 100, 1)
            : 0;

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
            'lowStocks',
            'orderCompleted',
            'orderPending',
            'orderCancelled',
            'categoryPerformace',
            'topCity',
            'repeatPurchaseRate',
            'returningCustomersRate',
            'filterStartDate',
            'filterEndDate',
        ]));
    }
}
