@props([
    'price',
    'totalDiscount',
    'badge',
    'discountModel' => 'total_discount',
    'newStyleModel' => null,
    'minimumPrice' => 0,
    'discountRequired' => true,
])

<section aria-labelledby="pricing-heading" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
    <div class="border-b border-gray-800 pb-5">
        <h3 id="pricing-heading" class="text-lg font-bold text-white">Price &amp; promotion</h3>
    </div>
    <div class="grid gap-5 pt-5 sm:grid-cols-2">
        <div>
            <label for="price" class="mb-2 block text-sm font-medium text-gray-300">Price</label>
            <div class="flex overflow-hidden rounded-xl border border-gray-700 bg-gray-950 focus-within:border-orange-500 focus-within:ring-2 focus-within:ring-orange-500/20">
                <span class="flex items-center border-r border-gray-700 px-4 text-sm text-gray-500">PKR</span>
                <input id="price" name="price" type="number" value="{{ $price }}" wire:model="price" min="{{ $minimumPrice }}" step="0.01" required class="min-w-0 flex-1 bg-transparent px-4 py-3 text-sm text-white outline-none">
            </div>
            @error('price')
                <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="total-discount" class="mb-2 block text-sm font-medium text-gray-300">Discount</label>
            <div class="flex overflow-hidden rounded-xl border border-gray-700 bg-gray-950 focus-within:border-orange-500 focus-within:ring-2 focus-within:ring-orange-500/20">
                <input id="total-discount" name="total_discount" type="number" wire:model="{{ $discountModel }}" value="{{ $totalDiscount }}" min="0" max="100" step="1" @if($discountRequired) required @endif class="min-w-0 flex-1 bg-transparent px-4 py-3 text-sm text-white outline-none">
                <span class="flex items-center border-l border-gray-700 px-4 text-sm text-gray-500">%</span>
            </div>
            @error($discountModel)
                <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="sm:col-span-2">
            <label for="badge" class="mb-2 block text-sm font-medium text-gray-300">Badge <span class="font-normal text-gray-500">(optional)</span></label>
            <input id="badge" type="text" wire:model="badge" value="{{ $badge }}" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
            @error('badge')
                <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>
        @if($newStyleModel)
            <label class="flex items-center gap-3 self-end pb-3 text-sm text-gray-300">
                <input wire:model="{{ $newStyleModel }}" type="checkbox" class="h-4 w-4 rounded border-gray-700 bg-gray-950 accent-orange-500">
                Mark as a new style
            </label>
        @endif
    </div>
</section>
