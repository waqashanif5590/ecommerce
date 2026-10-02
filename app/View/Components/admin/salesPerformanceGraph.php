<?php

namespace App\View\Components\Admin;

use App\Models\Order;
use Carbon\CarbonImmutable;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SalesPerformanceGraph extends Component
{
    public function __construct(
        public ?string $startDate = null,
        public ?string $endDate = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $hasSelectedPeriod = $this->startDate !== null && $this->endDate !== null;
        $periodStart = $hasSelectedPeriod
            ? CarbonImmutable::parse($this->startDate)->startOfDay()
            : CarbonImmutable::now()->startOfMonth();
        $periodEnd = $hasSelectedPeriod
            ? CarbonImmutable::parse($this->endDate)->endOfDay()
            : $periodStart->endOfMonth();
        $periodDays = (int) $periodStart->startOfDay()->diffInDays($periodEnd->startOfDay()) + 1;
        $weekCount = (int) ceil($periodDays / 7);
        $weeklySales = array_map(
            function (int $weekNumber) use ($periodStart, $periodEnd, $hasSelectedPeriod): array {
                $weekStart = $periodStart->addDays(($weekNumber - 1) * 7);
                $weekEnd = $weekStart->addDays(6)->min($periodEnd);

                return [
                    'label' => $hasSelectedPeriod
                        ? $weekStart->format('M j') . ' - ' . $weekEnd->format('M j')
                        : "Week {$weekNumber}",
                    'revenue' => 0,
                ];
            },
            range(1, $weekCount),
        );

        $dailySales = Order::query()
            ->whereBetween('created_at', [$periodStart, $periodEnd])
            ->selectRaw('DATE(created_at) as order_date')
            ->selectRaw('SUM(total) as revenue')
            ->groupByRaw('DATE(created_at)')
            ->get();

        foreach ($dailySales as $dailySale) {
            $dayOffset = (int) $periodStart->startOfDay()->diffInDays(
                CarbonImmutable::parse($dailySale->order_date)->startOfDay(),
            );
            $weekIndex = intdiv($dayOffset, 7);
            $weeklySales[$weekIndex]['revenue'] += (int) $dailySale->revenue;
        }

        $monthlyRevenue = array_sum(array_column($weeklySales, 'revenue'));
        $maxWeeklyRevenue = max(1, max(array_column($weeklySales, 'revenue')));
        $periodTitle = $hasSelectedPeriod
            ? 'Sales ' . $periodStart->format('M j') . ' - ' . $periodEnd->format('M j, Y')
            : 'Sales this month';
        $totalLabel = $hasSelectedPeriod ? 'Period total' : 'Monthly total';

        return view('components.admin.sales-performance-graph', compact(
            'weeklySales',
            'monthlyRevenue',
            'maxWeeklyRevenue',
            'periodTitle',
            'totalLabel',
        ));
    }
}
