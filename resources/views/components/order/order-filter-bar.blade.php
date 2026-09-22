    <section aria-labelledby="filter-heading" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
        <h2 id="filter-heading" class="text-lg font-bold text-white">Find an order</h2>
        <form class="mt-5 grid gap-4 sm:grid-cols-2 xl:grid-cols-[minmax(0,1.4fr)_minmax(150px,0.8fr)_minmax(150px,0.8fr)_auto]">
            <div><label for="order-search" class="mb-2 block text-sm font-medium text-gray-300">Search Orders</label>
                <div class="relative"><i class="fa-solid fa-magnifying-glass pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                    <input wire:model.live.debounce.300ms="search" id="order-search" name="search" type="search" placeholder="Order number or product" class="w-full rounded-xl border border-gray-700 bg-gray-950 py-3 pl-11 pr-4 text-sm text-white outline-none transition-colors placeholder:text-gray-600 focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                </div>
            </div>
            <div><label for="order-status" class="mb-2 block text-sm font-medium text-gray-300">Order Status</label>
                <select wire:model.live="status" id="order-status" name="status" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-gray-300 outline-none transition-colors focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                    <option value="">All statuses</option>
                    <option value="pending">Pending</option>
                    <option value="processed">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div>
                <label for="order-date" class="mb-2 block text-sm font-medium text-gray-300">Date Range</label>
                <select wire:model.live="date" id="order-date" name="date" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-gray-300 outline-none transition-colors focus:border-orange-500 focus:ring-1 focus:ring-orange-500">
                    <option value="">Any time</option>
                    <option value="30days">Last 30 days</option>
                    <option value="3months">Last 3 months</option>
                    <option value="year">This year</option>
                </select>
            </div>
            <button type="button" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-gray-900"><i class="fa-solid fa-filter"></i>Filter orders</button>
        </form>
    </section>