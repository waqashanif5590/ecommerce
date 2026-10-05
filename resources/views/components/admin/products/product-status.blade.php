@props(['status', 'isNew'])

<section aria-labelledby="status-heading" class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
    <div class="border-b border-gray-800 pb-4">
        <h3 id="status-heading" class="font-bold text-white">Product status</h3>
    </div>
    <div class="space-y-4 pt-4">
        <label for="product-status" class="mb-2 block text-sm font-medium text-gray-300">Status</label>
        <select id="product-status" name="status" wire:model="status" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
            <option value="1" {{ $status == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $status == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
        <label for="is-new" class="flex cursor-pointer items-start gap-3 rounded-xl border border-gray-800 bg-gray-950 p-3">
            <input id="is-new" name="is_new" type="checkbox" wire:model="is_new" value="1" {{ $isNew ? 'checked' : '' }} class="mt-0.5 h-4 w-4 rounded border-gray-700 bg-gray-900 text-orange-500 focus:ring-2 focus:ring-orange-500/30 focus:ring-offset-0">
            <span>
                <span class="block text-sm font-medium text-gray-200">New product</span>
                <span class="mt-1 block text-xs text-gray-500">Mark this product as new.</span>
            </span>
        </label>
    </div>
</section>
