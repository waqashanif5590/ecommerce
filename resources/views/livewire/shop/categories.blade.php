<main>
    <section
        class="relative overflow-hidden border-b border-gray-800 bg-gray-900 px-4 py-16 sm:px-6 lg:px-8 lg:py-24">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_80%_20%,rgba(249,115,22,0.18),transparent_32%),linear-gradient(135deg,#111827,#030712)]">
        </div>
        <div class="relative mx-auto max-w-7xl">
            <p class="mb-4 text-sm font-semibold uppercase tracking-[0.28em] text-orange-400">Find your stride</p>
            <h1 class="text-5xl font-black tracking-tight text-white sm:text-6xl">Shop by <span
                    class="text-orange-400">category.</span></h1>
            <p class="mt-6 max-w-xl text-lg leading-8 text-gray-400">Purpose-built footwear for fast mornings, long
                days, and every mile in between.</p>
            <div class="mt-12 flex flex-wrap gap-3 text-sm text-gray-400"><span
                    class="rounded-full border border-gray-700 bg-black/30 px-4 py-2"><i
                        class="fa-solid fa-shield-heart mr-2 text-orange-400"></i>Expert-approved
                    comfort</span><span class="rounded-full border border-gray-700 bg-black/30 px-4 py-2"><i
                        class="fa-solid fa-arrows-rotate mr-2 text-orange-400"></i>Easy 60-day returns</span></div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20" aria-labelledby="category-heading">
        <div class="mb-10 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Explore the collection
                </p>
                <h2 id="category-heading" class="mt-2 text-3xl font-bold text-white sm:text-4xl">Made for every move
                </h2>
            </div>
            <p class="max-w-xs text-sm leading-6 text-gray-500 sm:text-right">Choose a category to see the styles
                designed around the way you move.</p>
        </div>
        <div class="cards-container mt-12 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 lg:mt-16">
            @foreach($categories as $category)
            <x-shop.category-card :category="$category" />
            @endforeach
        </div>
    </section>
</main>