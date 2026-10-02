  @if ($categoryPerformance !== null)
  @php
      $chartColors = ['#f97316', '#38bdf8', '#a78bfa', '#34d399'];
      $circumference = 452;
      $offset = 0;
      $totalSold = collect($categoryPerformance)->sum('total_sold');
  @endphp
  <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
      <div>
          <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Order mix</p>
          <h3 class="mt-1 text-xl font-bold text-white">Sales by category</h3>
      </div>
      @if (count($categoryPerformance) > 0)
      <div class="mt-7 flex justify-center">
          <svg viewBox="0 0 200 200" class="h-48 w-48" role="img" aria-label="Sales by category for the selected period">
              <circle cx="100" cy="100" r="72" fill="none" stroke="#374151" stroke-width="32"></circle>
              @foreach ($categoryPerformance as $category)
                  @php
                      $segmentLength = $category->percentage * $circumference / 100;
                      $dashArray = $segmentLength . ' ' . ($circumference - $segmentLength);
                  @endphp
                  <circle cx="100" cy="100" r="72" fill="none" stroke="{{ $chartColors[$loop->index % count($chartColors)] }}" stroke-dasharray="{{ $dashArray }}" stroke-dashoffset="{{ -$offset }}" stroke-width="32" transform="rotate(-90 100 100)"></circle>
                  @php $offset += $segmentLength; @endphp
              @endforeach
              <text x="100" y="96" fill="white" font-size="22" font-weight="700" text-anchor="middle">{{ number_format($totalSold) }}</text>
              <text x="100" y="114" fill="#9ca3af" font-size="10" text-anchor="middle">items sold</text>
          </svg>
      </div>
      <div class="mt-5 space-y-3 text-sm">
          @foreach ($categoryPerformance as $category)
          <div class="flex items-center justify-between">
              <span class="flex items-center gap-2 text-gray-400">
                  <i class="fa-solid fa-circle" style="color: {{ $chartColors[$loop->index % count($chartColors)] }}"></i>{{ $category->title }}
              </span>
              <strong class="text-white">{{ $category->percentage }}%</strong>
          </div>
          @endforeach
      </div>
      @else
      <p class="mt-6 text-sm text-gray-400">No category sales in the selected period.</p>
      @endif
  </article>
  @else
  <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
      <div>
          <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Order mix</p>
          <h3 class="mt-1 text-xl font-bold text-white">Sales by category</h3>
      </div>
      <div class="mt-7 flex justify-center"><svg viewBox="0 0 200 200" class="h-48 w-48" role="img" aria-label="Pie chart showing sales by category">
              <circle cx="100" cy="100" r="72" fill="none" stroke="#374151" stroke-width="32"></circle>
              <circle cx="100" cy="100" r="72" fill="none" stroke="#f97316" stroke-dasharray="210 452" stroke-dashoffset="0" stroke-width="32" transform="rotate(-90 100 100)"></circle>
              <circle cx="100" cy="100" r="72" fill="none" stroke="#38bdf8" stroke-dasharray="135 452" stroke-dashoffset="-210" stroke-width="32" transform="rotate(-90 100 100)"></circle>
              <circle cx="100" cy="100" r="72" fill="none" stroke="#a78bfa" stroke-dasharray="107 452" stroke-dashoffset="-345" stroke-width="32" transform="rotate(-90 100 100)"></circle><text x="100" y="96" fill="white" font-size="22" font-weight="700" text-anchor="middle">1,284</text><text x="100" y="114" fill="#9ca3af" font-size="10" text-anchor="middle">orders</text>
          </svg></div>
      <div class="mt-5 space-y-3 text-sm">
          <div class="flex items-center justify-between"><span class="flex items-center gap-2 text-gray-400"><i class="fa-solid fa-circle text-orange-400"></i>Running shoes</span><strong class="text-white">46%</strong></div>
          <div class="flex items-center justify-between"><span class="flex items-center gap-2 text-gray-400"><i class="fa-solid fa-circle text-sky-400"></i>Casual shoes</span><strong class="text-white">30%</strong></div>
          <div class="flex items-center justify-between"><span class="flex items-center gap-2 text-gray-400"><i class="fa-solid fa-circle text-violet-400"></i>Accessories</span><strong class="text-white">24%</strong></div>
      </div>
  </article>
  @endif