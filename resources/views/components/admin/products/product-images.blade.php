@props(['product', 'newImages'])

<section aria-labelledby="images-heading" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
    <div class="flex flex-col justify-between gap-2 border-b border-gray-800 pb-5 sm:flex-row sm:items-start">
        <div>
            <h3 id="images-heading" class="text-lg font-bold text-white">Product images</h3>
            <p class="mt-1 text-sm text-gray-500">Choose the primary image and arrange the display order.</p>
        </div>
        <span class="text-xs text-gray-500">JPG, PNG or WEBP</span>
    </div>
    <div class="grid gap-4 pt-5 sm:grid-cols-2">
        @foreach($product->images as $image)
            <article wire:key="product-image-{{ $image->id }}" class="overflow-hidden rounded-xl border {{$image->is_primary ? 'border-orange-500/40' : 'border-gray-800'}} bg-gray-950">
                <div class="relative">
                    <img src="{{ $image->image_url }}" alt="Product image" class="h-48 w-full object-cover">
                    <span class="absolute left-3 top-3 rounded-full bg-orange-500 px-3 py-1 text-xs font-semibold text-white">Primary image</span>
                </div>
                <div class="flex items-center justify-between gap-3 p-3">
                    <label class="flex items-center gap-2 text-xs font-medium text-gray-300">
                        <input type="radio" wire:model="primaryImage" value="{{ $image->id }}" {{ $image->is_primary ? 'checked' : '' }} class="h-4 w-4 border-gray-700 bg-gray-900 text-orange-500 focus:ring-orange-500">
                        Set as primary
                    </label>
                    <label class="flex items-center gap-2 text-xs text-gray-400">Order
                        <input type="number" wire:model="image.sort_order" value="{{$image->sort_order}}" class="w-16 rounded-lg border border-gray-700 bg-gray-900 px-2 py-1.5 text-white outline-none focus:border-orange-500">
                    </label>
                </div>
                <div class="border-t border-gray-800 p-3">
                    <button type="button" class="text-xs font-semibold text-rose-400 transition-colors hover:text-rose-300"><i class="fa-solid fa-trash-can mr-1.5"></i>Remove image</button>
                </div>
            </article>
        @endforeach
    </div>
    <label for="product-images" class="mt-4 flex cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border border-dashed border-gray-700 bg-gray-950 px-4 py-7 text-center transition-colors hover:border-orange-500/60 hover:bg-orange-500/5">
        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-orange-500/10 text-orange-400"><i class="fa-solid fa-plus"></i></span>
        <span class="text-sm font-semibold text-gray-300">Add product images</span>
        <span class="text-xs text-gray-500">Select one or more image files</span>
        <input id="product-images" wire:model="newImages" type="file" accept="image/jpeg,image/png,image/webp" multiple class="sr-only">
    </label>
    @error('newImages')
        <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p>
    @enderror
    @foreach ($newImages as $index => $image)
        <div wire:key="new-product-image-{{ $index }}" class="mt-4">
            <img src="{{ $image->temporaryUrl() }}" alt="Preview of selected image {{ $index + 1 }}" class="h-40 w-40 rounded-xl border border-gray-700 object-cover">
            @error('newImages.'.$index)
                <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>
    @endforeach
    <div wire:loading wire:target="newImages" class="mt-2 text-sm text-gray-400">Uploading selected images…</div>
</section>
