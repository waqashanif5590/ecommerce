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
            <x-admin.products.product-details
                :name="$name"
                :category-id="$categoryId"
                :categories="$categories"
                :description="$description"
                category-model="categoryId"
                :show-slug="false"
                :include-empty-category="true"
                :description-required="true"
            />

            <x-admin.products.product-pricing
                :price="$price"
                :total-discount="$totalDiscount"
                :badge="$badge"
                discount-model="totalDiscount"
                new-style-model="isNew"
                :minimum-price="0.01"
                :discount-required="false"
            />

            <x-admin.products.product-variants
                :variants="$variants"
                :interactive="true"
                :show-status="false"
                :required-fields="true"
            />

            <x-admin.products.product-images
                :uploaded-images="$images"
                image-model="images"
                primary-image-model="primaryImage"
                :primary-image-index="$primaryImage"
                :required="true"
            />

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