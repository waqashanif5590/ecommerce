<main>
    <section class="border-b border-gray-800 bg-gray-900 px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="mx-auto max-w-7xl">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-orange-400">The full collection</p>
            <div class="mt-3 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div>
                    <h1 class="text-4xl font-black tracking-tight text-white sm:text-5xl">Find your next favorite
                        pair.</h1>
                    <p class="mt-3 max-w-2xl text-gray-400">Explore performance, comfort, and everyday style in one
                        place.</p>
                </div><span
                    class="w-fit rounded-full border border-gray-700 px-4 py-2 text-sm text-gray-400">Showing 24
                    products</span>
            </div>
            <form id="product-search" wire:submit.prevent
                class="mt-8 flex flex-col gap-3 sm:flex-row">
                <label class="relative block flex-1">
                    <span class="sr-only">Search products</span><i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                    <input type="search" wire:model.live.600ms="search" name="search" placeholder="Search shoes, collections, or styles" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-11 py-3.5 text-white outline-none transition-colors placeholder:text-gray-600 focus:border-orange-500">
                </label>
                <button type="submit" class="rounded-xl bg-orange-500 px-7 py-3 font-bold text-white transition-colors hover:bg-orange-400">Search</button>
            </form>
        </div>
    </section>
    <section class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <div class="grid gap-10 lg:grid-cols-[15rem_1fr]">
            <aside class="lg:sticky lg:top-24 lg:self-start" aria-label="Product filters">
                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-lg font-bold text-white">Filters</h2><a href="{{route('products')}}"
                        class="text-xs text-orange-400 hover:text-orange-300">Clear all</a>
                </div>
                <div class="border-b border-gray-800 pb-6">
                    <h3 class="mb-4 text-sm font-semibold uppercase tracking-wider text-gray-400">Categories</h3>
                    <div class="space-y-3 text-sm text-gray-600">
                        @foreach($categories as $category)
                        <a href="{{route('products.category', $category->slug)}}"
                            class="flex justify-between transition-colors hover:text-orange-400">
                            <span class="text-gray-300">{{$category->title}}</span>
                            <span
                                class="text-gray-600">34</span>
                        </a>
                        @endforeach

                    </div>
                </div>
                <fieldset class="border-b border-gray-800 py-6">
                    <legend class="mb-4 text-sm font-semibold uppercase tracking-wider text-gray-400">Price range
                    </legend>
                    <form action="{{route('products')}}" id="checkbox-form" method="get" class="space-y-3 text-sm text-gray-300">
                        <label class="flex items-center gap-3">
                            <input type="radio" wire:model.live.600ms="price"
                                name="price" value="" class="price-range h-4 w-4 accent-orange-500">
                            <span>All Products</span>
                        </label>
                        <label class="flex items-center gap-3">
                            <input type="radio" wire:model.live.600ms="price"
                                name="price" value="<1500" class="price-range h-4 w-4 accent-orange-500">
                            <span>Under PKR 1500</span>
                        </label>
                        <label class="flex items-center gap-3">
                            <input type="radio" wire:model.live.600ms="price"
                                name="price" value="1500-3000" class="price-range h-4 w-4 accent-orange-500">
                            <span>PKR 1500-3000</span>
                        </label>
                        <label class="flex items-center gap-3">
                            <input type="radio" wire:model.live.600ms="price"
                                name="price" value="3000-4000" class="price-range h-4 w-4 accent-orange-500">
                            <span>PKR 3000-4000</span>
                        </label>
                        <label class="flex items-center gap-3">
                            <input type="radio" wire:model.live.600ms="price"
                                name="price" value=">4000" class="price-range h-4 w-4 accent-orange-500">
                            <span>Over PKR 4000</span>
                        </label>
                    </form>
                </fieldset>
                <div class="pt-6">
                    <h3 class="mb-4 text-sm font-semibold uppercase tracking-wider text-gray-400">Features</h3>
                    <form class="space-y-3 text-sm text-gray-300">

                        <label class="flex items-center gap-3">
                            <input type="radio" wire:model.live.600ms="feature" value="best seller"
                                class="h-4 w-4 accent-orange-500">
                            <span>Bestsellers</span>
                        </label>
                        <label
                            class="flex items-center gap-3">
                            <input type="radio" wire:model.live.600ms="feature" value="new"
                                class="h-4 w-4 accent-orange-500">
                            <span>New styles</span>
                        </label>
                        <label
                            class="flex items-center gap-3">
                            <input type="radio" wire:model.live.600ms="feature" value="sale"
                                class="h-4 w-4 accent-orange-500"><span>On sale</span>
                        </label>
                    </form>
                </div>
            </aside>
            <div>
                <div
                    class="mb-7 flex flex-col justify-between gap-4 border-b border-gray-800 pb-5 sm:flex-row sm:items-center">
                    <p class="text-sm text-gray-500">24 results</p><label
                        class="flex items-center gap-3 text-sm text-gray-400">Sort by
                        <select name="sort" wire:model.live.600ms="sortBy"
                            class="rounded-lg border border-gray-700 bg-gray-900 px-3 py-2 text-gray-200 outline-none focus:border-orange-500">
                            <option value="">All Products</option>
                            <option value="newest">Newest</option>
                            <option value="top-rated">Top rated</option>
                            <option value="discount">Discount</option>
                            <option value="price-asc">Price: low to high</option>
                            <option value="price-desc">Price: high to low</option>
                        </select></label>
                </div>
                <div class="cards-container mx-auto mt-12 grid max-w-7xl grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:mt-16">
                    @foreach($products as $product)
                    <x-shop.product-card :product="$product" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    const form = document.getElementById('checkbox-form');
    document.querySelectorAll('.price-range').forEach(element => {
        element.addEventListener('checked', () => {
            form.submit();
        })
    })
</script>