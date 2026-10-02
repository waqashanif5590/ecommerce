<main class="min-h-screen bg-gray-950 px-4 py-8 text-gray-300 sm:px-6 lg:px-8 lg:py-10">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-8 lg:grid-cols-[220px_minmax(0,1fr)]">
            <aside class="hidden lg:block">
                <div class="sticky top-8 space-y-8">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-orange-400">Admin panel</p>
                        <h1 class="mt-2 text-2xl font-black tracking-tight text-white">Control center</h1>
                    </div>
                    <nav aria-label="Admin navigation" class="space-y-2">
                        <a href="#overview" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-chart-line w-4 text-center"></i>Overview</a>
                        <a href="#reports" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-chart-pie w-4 text-center"></i>Reports &amp; Analytics</a>
                        <a href="#orders" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-receipt w-4 text-center"></i>Orders</a>
                        <a href="#products" aria-current="page" class="flex items-center gap-3 rounded-xl bg-orange-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-orange-500/10"><i class="fa-solid fa-box-open w-4 text-center"></i>Products</a>
                        <a href="#customers" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-users w-4 text-center"></i>Customers</a>
                    </nav>
                    <div class="rounded-2xl border border-gray-800 bg-gray-900 p-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-orange-500 font-bold text-white">AD</div>
                            <div class="min-w-0">
                                <p class="truncate text-sm font-semibold text-white">Admin account</p>
                                <p class="truncate text-xs text-gray-500">Store manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

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
                        <button type="button" class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-500 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-orange-500/10 transition-colors hover:bg-orange-400">
                            <i class="fa-solid fa-check"></i>
                            Save changes
                        </button>
                    </div>
                </header>

                <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_320px]">
                    <div class="min-w-0 space-y-6">
                        <section aria-labelledby="product-information-heading" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                            <div class="border-b border-gray-800 pb-5">
                                <h3 id="product-information-heading" class="text-lg font-bold text-white">Product details</h3>
                                <p class="mt-1 text-sm text-gray-500">The information shown on the product page.</p>
                            </div>
                            <div class="space-y-5 pt-5">
                                <div>
                                    <label for="product-name" class="mb-2 block text-sm font-medium text-gray-300">Name</label>
                                    <input id="product-name" name="name" type="text" value="Classic Ceramic Pour-Over Kettle" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                </div>
                                <div>
                                    <label for="product-slug" class="mb-2 block text-sm font-medium text-gray-300">Slug</label>
                                    <input id="product-slug" name="slug" type="text" value="classic-ceramic-pour-over-kettle" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                </div>
                                <div>
                                    <label for="product-category" class="mb-2 block text-sm font-medium text-gray-300">Category</label>
                                    <select id="product-category" name="category_id" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                        <option value="1" selected>Home &amp; Living</option>
                                        <option value="2">Kitchen</option>
                                        <option value="3">Accessories</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="product-description" class="mb-2 block text-sm font-medium text-gray-300">Description</label>
                                    <textarea id="product-description" name="description" rows="5" class="w-full resize-y rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm leading-6 text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">A thoughtfully crafted ceramic pour-over kettle designed for your daily coffee ritual. Its balanced handle and precision spout give you a steady, controlled pour, while the glazed stoneware finish brings a warm, timeless touch to your kitchen.</textarea>
                                </div>
                            </div>
                        </section>

                        <section aria-labelledby="pricing-heading" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                            <div class="border-b border-gray-800 pb-5">
                                <h3 id="pricing-heading" class="text-lg font-bold text-white">Price &amp; promotion</h3>
                            </div>
                            <div class="grid gap-5 pt-5 sm:grid-cols-2">
                                <div>
                                    <label for="price" class="mb-2 block text-sm font-medium text-gray-300">Price</label>
                                    <div class="flex overflow-hidden rounded-xl border border-gray-700 bg-gray-950 focus-within:border-orange-500 focus-within:ring-2 focus-within:ring-orange-500/20">
                                        <span class="flex items-center border-r border-gray-700 px-4 text-sm text-gray-500">PKR</span>
                                        <input id="price" name="price" type="number" value="8400.00" step="0.01" class="min-w-0 flex-1 bg-transparent px-4 py-3 text-sm text-white outline-none">
                                    </div>
                                </div>
                                <div>
                                    <label for="total-discount" class="mb-2 block text-sm font-medium text-gray-300">Discount</label>
                                    <div class="flex overflow-hidden rounded-xl border border-gray-700 bg-gray-950 focus-within:border-orange-500 focus-within:ring-2 focus-within:ring-orange-500/20">
                                        <input id="total-discount" name="total_discount" type="number" value="20" min="0" step="1" class="min-w-0 flex-1 bg-transparent px-4 py-3 text-sm text-white outline-none">
                                        <span class="flex items-center border-l border-gray-700 px-4 text-sm text-gray-500">%</span>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="badge" class="mb-2 block text-sm font-medium text-gray-300">Badge <span class="font-normal text-gray-500">(optional)</span></label>
                                    <input id="badge" name="badge" type="text" value="Best Seller" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                </div>
                            </div>
                        </section>

                        <section aria-labelledby="images-heading" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                            <div class="flex flex-col justify-between gap-2 border-b border-gray-800 pb-5 sm:flex-row sm:items-start">
                                <div>
                                    <h3 id="images-heading" class="text-lg font-bold text-white">Product images</h3>
                                    <p class="mt-1 text-sm text-gray-500">Choose the primary image and arrange the display order.</p>
                                </div>
                                <span class="text-xs text-gray-500">JPG, PNG or WEBP</span>
                            </div>
                            <div class="grid gap-4 pt-5 sm:grid-cols-2">
                                <article class="overflow-hidden rounded-xl border border-orange-500/40 bg-gray-950">
                                    <div class="relative">
                                        <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&amp;fit=crop&amp;w=900&amp;q=85" alt="Ceramic kettle product image" class="h-48 w-full object-cover">
                                        <span class="absolute left-3 top-3 rounded-full bg-orange-500 px-3 py-1 text-xs font-semibold text-white">Primary image</span>
                                    </div>
                                    <div class="flex items-center justify-between gap-3 p-3">
                                        <label class="flex items-center gap-2 text-xs font-medium text-gray-300">
                                            <input type="radio" name="primary_image" value="1" checked class="h-4 w-4 border-gray-700 bg-gray-900 text-orange-500 focus:ring-orange-500">
                                            Set as primary
                                        </label>
                                        <label class="flex items-center gap-2 text-xs text-gray-400">Order
                                            <input type="number" name="image_order[]" value="0" class="w-16 rounded-lg border border-gray-700 bg-gray-900 px-2 py-1.5 text-white outline-none focus:border-orange-500">
                                        </label>
                                    </div>
                                    <div class="border-t border-gray-800 p-3">
                                        <button type="button" class="text-xs font-semibold text-rose-400 transition-colors hover:text-rose-300"><i class="fa-solid fa-trash-can mr-1.5"></i>Remove image</button>
                                    </div>
                                </article>
                                <article class="overflow-hidden rounded-xl border border-gray-800 bg-gray-950">
                                    <div class="relative">
                                        <img src="https://images.unsplash.com/photo-1517256673644-36ad11246d21?auto=format&amp;fit=crop&amp;w=900&amp;q=85" alt="Second ceramic kettle product image" class="h-48 w-full object-cover">
                                    </div>
                                    <div class="flex items-center justify-between gap-3 p-3">
                                        <label class="flex items-center gap-2 text-xs font-medium text-gray-300">
                                            <input type="radio" name="primary_image" value="2" class="h-4 w-4 border-gray-700 bg-gray-900 text-orange-500 focus:ring-orange-500">
                                            Set as primary
                                        </label>
                                        <label class="flex items-center gap-2 text-xs text-gray-400">Order
                                            <input type="number" name="image_order[]" value="1" class="w-16 rounded-lg border border-gray-700 bg-gray-900 px-2 py-1.5 text-white outline-none focus:border-orange-500">
                                        </label>
                                    </div>
                                    <div class="border-t border-gray-800 p-3">
                                        <button type="button" class="text-xs font-semibold text-rose-400 transition-colors hover:text-rose-300"><i class="fa-solid fa-trash-can mr-1.5"></i>Remove image</button>
                                    </div>
                                </article>
                            </div>
                            <label for="product-images" class="mt-4 flex cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border border-dashed border-gray-700 bg-gray-950 px-4 py-7 text-center transition-colors hover:border-orange-500/60 hover:bg-orange-500/5">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-orange-500/10 text-orange-400"><i class="fa-solid fa-plus"></i></span>
                                <span class="text-sm font-semibold text-gray-300">Add product images</span>
                                <span class="text-xs text-gray-500">Select one or more image files</span>
                                <input id="product-images" name="images[]" type="file" accept="image/png,image/jpeg,image/webp" multiple class="sr-only">
                            </label>
                        </section>

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
                                <article class="rounded-xl border border-gray-800 bg-gray-950 p-4">
                                    <div class="mb-4 flex items-center justify-between gap-3">
                                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">Variant 1</p>
                                        <button type="button" aria-label="Delete variant 1" class="inline-flex items-center gap-2 rounded-lg px-2 py-1.5 text-xs font-semibold text-rose-400 transition-colors hover:bg-rose-500/10 hover:text-rose-300">
                                            <i class="fa-solid fa-trash-can"></i>Remove
                                        </button>
                                    </div>
                                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                                        <div>
                                            <label for="variant-1-size" class="mb-2 block text-xs font-medium text-gray-400">Size</label>
                                            <input id="variant-1-size" name="variants[0][size]" type="text" value="Small" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                        </div>
                                        <div>
                                            <label for="variant-1-color" class="mb-2 block text-xs font-medium text-gray-400">Color</label>
                                            <input id="variant-1-color" name="variants[0][color]" type="text" value="Sand" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                        </div>
                                        <div>
                                            <label for="variant-1-quantity" class="mb-2 block text-xs font-medium text-gray-400">Quantity</label>
                                            <input id="variant-1-quantity" name="variants[0][quantity]" type="number" value="18" min="0" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                        </div>
                                        <div>
                                            <label for="variant-1-status" class="mb-2 block text-xs font-medium text-gray-400">Status</label>
                                            <select id="variant-1-status" name="variants[0][status]" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                                <option value="1" selected>Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </article>

                                <article class="rounded-xl border border-gray-800 bg-gray-950 p-4">
                                    <div class="mb-4 flex items-center justify-between gap-3">
                                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">Variant 2</p>
                                        <button type="button" aria-label="Delete variant 2" class="inline-flex items-center gap-2 rounded-lg px-2 py-1.5 text-xs font-semibold text-rose-400 transition-colors hover:bg-rose-500/10 hover:text-rose-300">
                                            <i class="fa-solid fa-trash-can"></i>Remove
                                        </button>
                                    </div>
                                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                                        <div>
                                            <label for="variant-2-size" class="mb-2 block text-xs font-medium text-gray-400">Size</label>
                                            <input id="variant-2-size" name="variants[1][size]" type="text" value="Medium" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                        </div>
                                        <div>
                                            <label for="variant-2-color" class="mb-2 block text-xs font-medium text-gray-400">Color</label>
                                            <input id="variant-2-color" name="variants[1][color]" type="text" value="Forest Green" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                        </div>
                                        <div>
                                            <label for="variant-2-quantity" class="mb-2 block text-xs font-medium text-gray-400">Quantity</label>
                                            <input id="variant-2-quantity" name="variants[1][quantity]" type="number" value="24" min="0" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                        </div>
                                        <div>
                                            <label for="variant-2-status" class="mb-2 block text-xs font-medium text-gray-400">Status</label>
                                            <select id="variant-2-status" name="variants[1][status]" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                                <option value="1" selected>Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </article>

                                <article class="rounded-xl border border-gray-800 bg-gray-950 p-4">
                                    <div class="mb-4 flex items-center justify-between gap-3">
                                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-500">Variant 3</p>
                                        <button type="button" aria-label="Delete variant 3" class="inline-flex items-center gap-2 rounded-lg px-2 py-1.5 text-xs font-semibold text-rose-400 transition-colors hover:bg-rose-500/10 hover:text-rose-300">
                                            <i class="fa-solid fa-trash-can"></i>Remove
                                        </button>
                                    </div>
                                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                                        <div>
                                            <label for="variant-3-size" class="mb-2 block text-xs font-medium text-gray-400">Size</label>
                                            <input id="variant-3-size" name="variants[2][size]" type="text" value="Large" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                        </div>
                                        <div>
                                            <label for="variant-3-color" class="mb-2 block text-xs font-medium text-gray-400">Color</label>
                                            <input id="variant-3-color" name="variants[2][color]" type="text" value="Sand" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                        </div>
                                        <div>
                                            <label for="variant-3-quantity" class="mb-2 block text-xs font-medium text-gray-400">Quantity</label>
                                            <input id="variant-3-quantity" name="variants[2][quantity]" type="number" value="9" min="0" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                        </div>
                                        <div>
                                            <label for="variant-3-status" class="mb-2 block text-xs font-medium text-gray-400">Status</label>
                                            <select id="variant-3-status" name="variants[2][status]" class="w-full rounded-lg border border-gray-700 bg-gray-900 px-3 py-2.5 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                                <option value="1" selected>Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </article>
                                <p class="flex items-start gap-2 text-xs leading-5 text-gray-500">
                                    <i class="fa-solid fa-circle-info mt-0.5 text-orange-400"></i>
                                    Add one variant for each size and color combination you sell.
                                </p>
                            </div>
                        </section>
                    </div>

                    <aside class="space-y-6">
                        <section aria-labelledby="status-heading" class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                            <div class="border-b border-gray-800 pb-4">
                                <h3 id="status-heading" class="font-bold text-white">Product status</h3>
                            </div>
                            <div class="space-y-4 pt-4">
                                <label for="product-status" class="mb-2 block text-sm font-medium text-gray-300">Status</label>
                                <select id="product-status" name="status" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <label for="is-new" class="flex cursor-pointer items-start gap-3 rounded-xl border border-gray-800 bg-gray-950 p-3">
                                    <input id="is-new" name="is_new" type="checkbox" value="1" checked class="mt-0.5 h-4 w-4 rounded border-gray-700 bg-gray-900 text-orange-500 focus:ring-2 focus:ring-orange-500/30 focus:ring-offset-0">
                                    <span>
                                        <span class="block text-sm font-medium text-gray-200">New product</span>
                                        <span class="mt-1 block text-xs text-gray-500">Mark this product as new.</span>
                                    </span>
                                </label>
                            </div>
                        </section>

                        <section aria-labelledby="summary-heading" class="overflow-hidden rounded-2xl border border-gray-800 bg-gray-900">
                            <div class="border-b border-gray-800 p-5">
                                <h3 id="summary-heading" class="font-bold text-white">Product preview</h3>
                            </div>
                            <div class="space-y-4 p-5">
                                <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&amp;fit=crop&amp;w=640&amp;q=80" alt="Classic Ceramic Pour-Over Kettle" class="aspect-[4/3] w-full rounded-xl object-cover">
                                <div>
                                    <p class="text-sm font-semibold text-white">Classic Ceramic Pour-Over Kettle</p>
                                    <p class="mt-1 text-xs text-gray-500">Home &amp; Living</p>
                                </div>
                                <div class="flex items-center justify-between border-t border-gray-800 pt-4 text-sm">
                                    <span class="text-gray-500">Price</span>
                                    <span class="font-semibold text-white">PKR 8,400</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">Discount</span>
                                    <span class="font-semibold text-orange-300">20%</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500">Variants</span>
                                    <span class="font-semibold text-white">3 size / color combinations</span>
                                </div>
                            </div>
                        </section>

                        <button type="button" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-orange-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-orange-500/10 transition-colors hover:bg-orange-400">
                            <i class="fa-solid fa-check"></i>
                            Save changes
                        </button>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>
