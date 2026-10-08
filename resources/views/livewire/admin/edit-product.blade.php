<main class="min-h-screen bg-gray-950 px-4 py-8 text-gray-300 sm:px-6 lg:px-8 lg:py-10">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-8 lg:grid-cols-[220px_minmax(0,1fr)]">
            <x-admin.admin-sidebar :totalOrders="$pendingOrders" />

            <div class="min-w-0 space-y-8">
                <header class="flex flex-col justify-between gap-5 border-b border-gray-800 pb-7 sm:flex-row sm:items-end">
                    <div>
                        <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-sm text-gray-500">
                            <a href="#products" class="transition-colors hover:text-gray-300">Products</a>
                            <span aria-hidden="true">/</span>
                            <span class="text-gray-300">Edit product</span>
                        </nav>
                        <h2 class="mt-3 text-3xl font-black tracking-tight text-white sm:text-4xl">Edit product</h2>
                        <p class="mt-2 text-sm text-gray-500">Update this product and its size and color variants.</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <button type="button" class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-700 px-4 py-2.5 text-sm font-semibold text-gray-300 transition-colors hover:border-gray-600 hover:bg-gray-900 hover:text-white">
                            <i class="fa-solid fa-arrow-left"></i>
                            Back to products
                        </button>
                        <button type="button" wire:click="confirmSaveChanges({{$product->id}})" class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-500 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-orange-500/10 transition-colors hover:bg-orange-400">
                            <i class="fa-solid fa-check"></i>
                            Save changes
                        </button>
                    </div>
                </header>

                <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_320px]">
                    <div class="min-w-0 space-y-6">
                        <x-admin.products.product-details
                            :name="$name"
                            :slug="$slug"
                            :category-id="$category_id"
                            :categories="$categories"
                            :description="$description"
                        />

                        <x-admin.products.product-pricing
                            :price="$price"
                            :total-discount="$total_discount"
                            :badge="$badge"
                        />

                        <x-admin.products.product-images
                            :product="$product"
                            :uploaded-images="$newImages"
                            :primary-image="$primaryImage"
                            image-model="newImages"
                        />

                        <x-admin.products.product-variants :variants="$variants" />
                    </div>

                    <aside class="space-y-6">
                        <x-admin.products.product-status
                            :status="$status"
                            :is-new="$is_new"
                        />

                        <x-admin.products.product-preview :product="$product" />

                        <button type="button" wire:click="confirmSaveChanges({{$product->id}})" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-orange-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-orange-500/10 transition-colors hover:bg-orange-400">
                            <i class="fa-solid fa-check"></i>
                            Save changes
                        </button>
                    </aside>

                    <x-modals.confirmation-modal
                        wire:key="save-changes-modal"
                        name="save-changes"
                        title="Save Changes"
                        message="Are you sure you want to save the changes made to this product?"
                        confirmText="Yes, save changes"
                    />
                </div>
            </div>
        </div>
    </div>
</main>
