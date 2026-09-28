     @php
     $progressColors = ['bg-orange-500', 'bg-emerald-500', 'bg-sky-500', 'bg-violet-500'];
     @endphp
     <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
         <div class="flex items-center justify-between">
             <div>
                 <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Top performers</p>
                 <h3 class="mt-1 text-xl font-bold text-white">Best-selling products</h3>
             </div><i class="fa-solid fa-arrow-trend-up text-orange-400"></i>
         </div>
         <div class="mt-6 space-y-5">
             @php
             $topSellingProducts = collect($topSellingProducts ?? []);
             $maxSold = $topSellingProducts->max('total_sold') ?? 0;
             @endphp

             @forelse($topSellingProducts as $item)

             @php
             $percentage = $maxSold > 0 ? ($item->total_sold / $maxSold * 100) : 0;
             $progressColor = $progressColors[$loop->index % count($progressColors)];
             @endphp
             <div class="flex items-center gap-4">
                 <div class="flex h-11 w-11 items-center justify-center rounded-xl {{ $progressColor }}/15"><i class="fa-solid fa-shoe-prints"></i></div>
                 <div class="min-w-0 flex-1">
                     <div class="flex justify-between gap-3 text-sm">
                         <p class="truncate font-semibold text-white">{{$item->product->name}}</p><span class="text-gray-500">{{$item->total_sold}} sold</span>
                     </div>
                     <div class="mt-2 h-1.5 rounded-full bg-gray-800">
                         <div class="h-1.5 rounded-full {{ $progressColor }}" style="width: {{ $percentage }}%; "></div>
                     </div>
                 </div>
             </div>
             @empty
             <p class="text-sm text-gray-400">No products have sold yet.</p>
             @endforelse
         </div>
     </article>