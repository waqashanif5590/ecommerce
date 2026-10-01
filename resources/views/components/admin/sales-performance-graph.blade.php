<article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-start">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">
                Revenue overview
            </p>
            <h3 id="sales-performance-title" class="mt-1 text-xl font-bold text-white">
                Sales this month
            </h3>
            <p class="mt-1 text-sm text-gray-500">Weekly revenue (PKR)</p>
        </div>

        <div class="rounded-lg border border-gray-800 bg-gray-950 px-3 py-2 sm:text-right">
            <p class="text-xs font-medium text-gray-500">Monthly total</p>
            <p class="mt-1 text-sm font-bold tabular-nums text-white">PKR {{ number_format($monthlyRevenue) }}</p>
        </div>
    </div>

    <div class="mt-8">
        <div
            class="relative h-52 sm:h-60"
            role="img"
            aria-labelledby="sales-performance-title"
            aria-label="Weekly revenue this month in PKR. Monthly total: PKR {{ number_format($monthlyRevenue) }}.">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 flex flex-col justify-between">
                <span class="border-t border-dashed border-gray-800"></span>
                <span class="border-t border-dashed border-gray-800"></span>
                <span class="border-t border-dashed border-gray-800"></span>
                <span class="border-t border-gray-700"></span>
            </div>

            <div class="relative grid h-full grid-flow-col auto-cols-fr gap-2">
                @foreach ($weeklySales as $week)
                @php
                $barHeight = round(($week['revenue'] / $maxWeeklyRevenue) * 84);
                $revenueLabel = $week['revenue'] >= 1000
                    ? number_format($week['revenue'] / 1000, $week['revenue'] % 1000 === 0 ? 0 : 1) . 'k'
                    : number_format($week['revenue']);
                @endphp

                <div class="relative h-full">
                    <span
                        class="absolute inset-x-0 z-20 whitespace-nowrap text-center text-[10px] font-semibold tabular-nums text-gray-300 sm:text-xs"
                            title="PKR {{ number_format($week['revenue']) }}"
                            @style(['bottom: calc(' . $barHeight . '% + 0.5rem)'])>
                        {{ $revenueLabel }}
                    </span>
                    <div
                        aria-hidden="true"
                        class="absolute bottom-0 left-1/4 right-1/4 rounded-t-md shadow-sm shadow-orange-950/30 {{ $week['revenue'] === $maxWeeklyRevenue ? 'bg-orange-400' : 'bg-orange-500/75' }}"
                            @style(['height: ' . $barHeight . '%'])></div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3 grid grid-flow-col auto-cols-fr gap-2 text-center text-xs font-medium text-gray-500">
            @foreach ($weeklySales as $week)
            <span>{{ $week['label'] }}</span>
            @endforeach
        </div>
    </div>
</article>