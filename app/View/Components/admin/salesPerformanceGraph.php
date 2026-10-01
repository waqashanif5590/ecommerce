<?php

namespace App\View\Components\Admin;

use App\Models\Order;
use Carbon\CarbonImmutable;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SalesPerformanceGraph extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $monthStart = now()->startOfMonth();
        $monthEnd = $monthStart->copy()->endOfMonth();
        $weekCount = (int) ceil($monthStart->daysInMonth / 7);
        $weeklySales = array_map(
            fn (int $weekNumber): array => [
                'label' => "Week {$weekNumber}",
                'revenue' => 0,
            ],
            range(1, $weekCount),
        );

        $dailySales = Order::query()
            ->whereBetween('created_at', [$monthStart, $monthEnd])
            ->selectRaw('DATE(created_at) as order_date')
            ->selectRaw('SUM(total) as revenue')
            ->groupByRaw('DATE(created_at)')
            ->get();

        foreach ($dailySales as $dailySale) {
            $dayOfMonth = CarbonImmutable::parse($dailySale->order_date)->day;
            $weekIndex = intdiv($dayOfMonth - 1, 7);
            $weeklySales[$weekIndex]['revenue'] += (int) $dailySale->revenue;
        }

        $monthlyRevenue = array_sum(array_column($weeklySales, 'revenue'));
        $maxWeeklyRevenue = max(1, max(array_column($weeklySales, 'revenue')));

        return view('components.admin.sales-performance-graph', compact(
            'weeklySales',
            'monthlyRevenue',
            'maxWeeklyRevenue',
        ));
    }
}
