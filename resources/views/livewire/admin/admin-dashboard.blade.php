<main class="min-h-screen bg-gray-950 px-4 py-8 text-gray-300 sm:px-6 lg:px-8 lg:py-10">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-8 lg:grid-cols-[220px_minmax(0,1fr)]">
            <x-admin.admin-sidebar :totalOrders="$total_orders" />

            <div id="overview" class="min-w-0 space-y-8">
                <header class="flex flex-col justify-between gap-5 border-b border-gray-800 pb-7 sm:flex-row sm:items-end">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-orange-400">{{now()->format('l, F j, Y')}}</p>
                        <h2 class="mt-2 text-3xl font-black tracking-tight text-white sm:text-4xl">Good morning, Admin.</h2>
                        <p class="mt-2 text-sm text-gray-500">Here is what is happening with your store today.</p>
                    </div>
                </header>

                <section aria-label="Store performance" class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <x-admin.performance-card title="Total Revenue"
                        :value="$totalRevenue"
                        description="Compared with last month"
                        :growth="($revenueGrowth>=0?'+':'-') . number_format($revenueGrowth, 1) . '%'"
                        :text="$revenueGrowth>=0?'text-emerald-400':'text-rose-400'"
                        icon="fa-wallet" />
                    <x-admin.performance-card title="Total Orders"
                        :value="$total_orders"
                        description="Across all channels"
                        :growth="($ordersGrowth>=0?'+':'-') . number_format($ordersGrowth, 1) . '%'"
                        :text="$ordersGrowth>=0?'text-emerald-400':'text-rose-400'"
                        icon="fa-cart-shopping" />
                    <x-admin.performance-card title="New Customers"
                        :value="$new_customers"
                        description="Since the start of month"
                        :growth="($customersGrowth>=0?'+':'-') . number_format($customersGrowth, 1) . '%'"
                        :text="$customersGrowth>=0?'text-emerald-400':'text-rose-400'"
                        icon="fa-user-plus" />
                    <x-admin.performance-card title="Low Stock Items"
                        :value="$low_stock_items"
                        description="Products below 10 units"
                        growth="-10.3%"
                        text="text-rose-400"
                        icon="fa-boxes-stacked" />
                </section>

                <section class="grid gap-8 xl:grid-cols-[minmax(0,1.55fr)_minmax(300px,0.85fr)]">
                    <x-admin.sales-performance-graph />

                    <x-admin.category-performance-graph />
                </section>

                <section id="orders" class="rounded-2xl border border-gray-800 bg-gray-900">
                    <div class="flex flex-col justify-between gap-3 border-b border-gray-800 p-5 sm:flex-row sm:items-center sm:p-6">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Needs your attention</p>
                            <h3 class="mt-1 text-xl font-bold text-white">Recent orders</h3>
                        </div><a href="{{route('all.orders')}}" class="inline-flex items-center gap-2 text-sm font-semibold text-orange-400 hover:text-orange-300">View all orders <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="overflow-x-auto">
                        <x-order.order-row :orders="$orders" />
                    </div>
                </section>

                <section id="products" class="grid gap-8 md:grid-cols-2">
                    <x-admin.best-selling-products :topSellingProducts="$topSellingProducts"/>
                    <x-admin.customer-list :customers="$customers"/>
                </section>
            </div>
        </div>
    </div>
</main>