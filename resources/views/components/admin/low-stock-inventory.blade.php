<section class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
    <div class="flex items-center justify-between gap-4">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Inventory watch</p>
            <h3 class="mt-1 text-xl font-bold text-white">Low stock products</h3>
        </div>
        <i class="fa-solid fa-boxes-stacked text-orange-400"></i>
    </div>
    <div class="mt-6 grid gap-3 sm:grid-cols-3">
        @foreach($lowStocks as $item)
        <div class="flex items-center justify-between rounded-xl bg-gray-950 p-4">
            <span class="text-sm font-semibold text-white">{{$item->name}}</span>
            <span class="text-xs font-bold text-rose-400">{{$item->variants_sum_quantity}} left</span>
        </div>
        @endforeach
        @if($lowStocks->isEmpty())
        <p class="text-sm font-semibold text-orange-400">No product has quantity less than 10 items.</p>
        @endif
    </div>
</section>