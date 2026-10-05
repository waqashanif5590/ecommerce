@props(['variants'])

<section aria-labelledby="variants-heading" class="overflow-hidden rounded-2xl border border-gray-800 bg-gray-900">
    <div class="flex flex-col justify-between gap-3 border-b border-gray-800 p-5 sm:flex-row sm:items-center sm:p-6">
        <div>
            <h3 id="variants-heading" class="text-lg font-bold text-white">Size &amp; color variants</h3>
            <p class="mt-1 text-sm text-gray-500">Each row is a product variant with its own size, color, stock, and status.</p>
        </div>
        <button type="button" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl border border-orange-500/40 bg-orange-500/10 px-4 py-2.5 text-sm font-semibold text-orange-300 transition-colors hover:border-orange-500 hover:bg-orange-500/20">
            <i class="fa-solid fa-plus"></i>
            Add size / color
        </button>
    </div>
    <div class="space-y-4 p-5 sm:p-6">
        @foreach($variants as $index => $variant)
            <article wire:key="product-variant-{{ $variant['id'] }}" class="rounded-xl border border-gray-800 bg-gray-950 p-4">
                <div class="mb-4 flex items-center justify-between gap-3">
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">Variant {{ $index + 1 }}</p>
                    <button type="button" aria-label="Delete variant {{ $index + 1 }}" class="inline-flex items-center gap-2 rounded-lg px-2 py-1.5 text-xs font-semibold text-rose-400 transition-colors hover:bg-rose-500/10 hover:text-rose-300">
                        <i class="fa-solid fa-trash-can"></i>Remove
                    </button>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <div>
                        <label for="variant-{{ $index + 1 }}-size" class="mb-2 block text-xs font-medium text-gray-400">Size</label>
                        <input id="variant-{{ $index + 1 }}-size" wire:model="variants.{{ $index }}.size" type="text" value="{{ $variant['size'] }}" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                    </div>
                    <div>
                        <label for="variant-{{ $index + 1 }}-color" class="mb-2 block text-xs font-medium text-gray-400">Color</label>
                        <input id="variant-{{ $index + 1 }}-color" wire:model="variants.{{ $index }}.color" type="text" value="{{ $variant['color'] }}" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                    </div>
                    <div>
                        <label for="variant-{{ $index + 1 }}-quantity" class="mb-2 block text-xs font-medium text-gray-400">Quantity</label>
                        <input id="variant-{{ $index + 1 }}-quantity" wire:model="variants.{{ $index }}.quantity" type="number" value="{{ $variant['quantity'] }}" min="0" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                    </div>
                    <div>
                        <label for="variant-{{ $index + 1 }}-status" class="mb-2 block text-xs font-medium text-gray-400">Status</label>
                        <select id="variant-{{ $index + 1 }}-status" wire:model="variants.{{ $index }}.status" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                            <option value="1" {{ $variant['status'] == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $variant['status'] == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </article>
        @endforeach

        <p class="flex items-start gap-2 text-xs leading-5 text-gray-500">
            <i class="fa-solid fa-circle-info mt-0.5 text-orange-400"></i>
            Add one variant for each size and color combination you sell.
        </p>
    </div>
</section>
