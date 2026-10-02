<main class="min-h-screen bg-gray-950 px-4 py-8 text-gray-300 sm:px-6 lg:px-8 lg:py-12">
    <div class="mx-auto max-w-4xl">
        <header class="mb-8 flex flex-col justify-between gap-5 border-b border-gray-800 pb-7 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-orange-400">Admin panel</p>
                <h1 class="mt-2 text-3xl font-black tracking-tight text-white sm:text-4xl">Add a product</h1>
                <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-400">Add product details, a first size and color variant, and a primary image for the storefront.</p>
            </div>
            <a href="{{ route('products') }}" class="inline-flex w-fit items-center gap-2 rounded-xl border border-gray-700 px-4 py-2.5 text-sm font-semibold text-gray-300 hover:bg-gray-900 hover:text-white">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to products
            </a>
        </header>

        <form wire:submit="save" class="space-y-6">
            <section class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6" aria-labelledby="product-details-heading">
                <div class="border-b border-gray-800 pb-5">
                    <h2 id="product-details-heading" class="text-lg font-bold text-white">Product details</h2>
                    <p class="mt-1 text-sm text-gray-500">The product name determines its storefront URL.</p>
                </div>
                <div class="grid gap-5 pt-5 sm:grid-cols-2">
                    <div>
                        <label for="product-name" class="mb-2 block text-sm font-medium text-gray-300">Name</label>
                        <input id="product-name" wire:model="name" type="text" required class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                        @error('name') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="product-category" class="mb-2 block text-sm font-medium text-gray-300">Category</label>
                        <select id="product-category" wire:model="categoryId" required class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                            <option value="">Choose a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('categoryId') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="product-description" class="mb-2 block text-sm font-medium text-gray-300">Description</label>
                        <textarea id="product-description" wire:model="description" rows="5" required class="w-full resize-y rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm leading-6 text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20"></textarea>
                        @error('description') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                </div>
            </section>

            <section class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6" aria-labelledby="product-price-heading">
                <h2 id="product-price-heading" class="border-b border-gray-800 pb-5 text-lg font-bold text-white">Price &amp; promotion</h2>
                <div class="grid gap-5 pt-5 sm:grid-cols-2">
                    <div>
                        <label for="product-price" class="mb-2 block text-sm font-medium text-gray-300">Price (PKR)</label>
                        <input id="product-price" wire:model="price" type="number" min="0.01" step="0.01" required class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                        @error('price') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="product-discount" class="mb-2 block text-sm font-medium text-gray-300">Discount (%)</label>
                        <input id="product-discount" wire:model="totalDiscount" type="number" min="0" max="100" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                        @error('totalDiscount') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="product-badge" class="mb-2 block text-sm font-medium text-gray-300">Badge</label>
                        <input id="product-badge" wire:model="badge" type="text" maxlength="255" placeholder="For example: Bestseller" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                        @error('badge') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                    <label class="flex items-center gap-3 self-end pb-3 text-sm text-gray-300">
                        <input wire:model="isNew" type="checkbox" class="h-4 w-4 rounded border-gray-700 bg-gray-950 accent-orange-500">
                        Mark as a new style
                    </label>
                </div>
            </section>

            <section class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6" aria-labelledby="product-variant-heading">
                <h2 id="product-variant-heading" class="text-lg font-bold text-white">First size &amp; color variant</h2>
                <p class="mt-1 text-sm text-gray-500">You can add more variants after creating the product.</p>
                <div class="grid gap-5 pt-5 sm:grid-cols-3">
                    <div>
                        <label for="product-size" class="mb-2 block text-sm font-medium text-gray-300">Size</label>
                        <input id="product-size" wire:model="size" type="text" required class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                        @error('size') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="product-color" class="mb-2 block text-sm font-medium text-gray-300">Color</label>
                        <input id="product-color" wire:model="color" type="text" required class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                        @error('color') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="product-quantity" class="mb-2 block text-sm font-medium text-gray-300">Quantity</label>
                        <input id="product-quantity" wire:model="quantity" type="number" min="0" required class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                        @error('quantity') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                </div>
            </section>

            <section class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6" aria-labelledby="product-image-heading">
                <h2 id="product-image-heading" class="text-lg font-bold text-white">Primary image</h2>
                <p class="mt-1 text-sm text-gray-500">Choose a JPG, PNG, or WebP image up to 5 MB.</p>
                <div class="pt-5">
                    <label for="product-image" class="mb-2 block text-sm font-medium text-gray-300">Product image</label>
                    <input id="product-image" wire:model="image" type="file" accept="image/jpeg,image/png,image/webp" required class="block w-full text-sm text-gray-400 file:mr-4 file:rounded-lg file:border-0 file:bg-orange-500/10 file:px-4 file:py-2 file:font-semibold file:text-orange-300">
                    @error('image') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    <div wire:loading wire:target="image" class="mt-2 text-sm text-gray-400">Uploading image…</div>
                    @if($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview of the selected product" class="mt-4 h-40 w-40 rounded-xl border border-gray-700 object-cover">
                    @endif
                </div>
            </section>

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('products') }}" class="inline-flex items-center justify-center rounded-xl border border-gray-700 px-5 py-3 text-sm font-semibold text-gray-300 hover:bg-gray-900 hover:text-white">Cancel</a>
                <button type="submit" wire:loading.attr="disabled" wire:target="save" class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-semibold text-white hover:bg-orange-400 disabled:cursor-not-allowed disabled:opacity-60">
                    <i class="fa-solid fa-plus" aria-hidden="true"></i>
                    <span wire:loading.remove wire:target="save">Create product</span>
                    <span wire:loading wire:target="save">Creating…</span>
                </button>
            </div>
        </form>
    </div>
</main>
