<main class="bg-gray-950 px-4 py-10 text-gray-300 sm:px-6 lg:px-8 lg:py-14">
    <div class="mx-auto max-w-7xl">
        <!-- Account Container -->
        <div class="grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)] lg:items-start">
            <!-- Account Sidebar -->
            <x-user.dashboard-sidebar />

            <div id="orders" class="min-w-0 space-y-8">
                <!-- Page Header -->
                <header>
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-orange-400">Account area</p>
                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">My Orders</h1>
                    <p class="mt-2 text-sm leading-6 text-gray-400">View and manage your recent orders.</p>
                </header>

                <!-- Order Filters -->
                <x-user.order-filter-bar />

                <!-- Order List -->
                <section aria-labelledby="order-list-heading">
                    <div class="mb-4 flex items-end justify-between gap-4">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Order history</p>
                            <h2 id="order-list-heading" class="mt-1 text-xl font-bold text-white">{{$orders->count()}} orders</h2>
                        </div>
                        <p class="hidden text-sm text-gray-500 sm:block">Showing your latest purchases</p>
                    </div>
                    <div class="space-y-5">
                        @foreach($orders as $order)
                        <x-user.order-row :order="$order" />
                        @endforeach
                    </div>
                </section>

                <!-- Pagination -->
                <nav aria-label="Orders pagination" class="flex flex-wrap items-center justify-center gap-2 border-t border-gray-800 pt-6"><a href="#previous" class="inline-flex min-h-10 items-center gap-2 rounded-lg border border-gray-700 px-3 text-sm text-gray-500 transition-colors hover:border-orange-500 hover:text-orange-400"><i class="fa-solid fa-chevron-left text-xs"></i><span class="hidden sm:inline">Previous</span></a><a href="#page-1" aria-current="page" class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-orange-500 text-sm font-bold text-white">1</a><a href="#page-2" class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-700 text-sm transition-colors hover:border-orange-500 hover:text-orange-400">2</a><a href="#page-3" class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-700 text-sm transition-colors hover:border-orange-500 hover:text-orange-400">3</a><a href="#page-4" class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-700 text-sm transition-colors hover:border-orange-500 hover:text-orange-400">4</a><a href="#next" class="inline-flex min-h-10 items-center gap-2 rounded-lg border border-gray-700 px-3 text-sm text-gray-300 transition-colors hover:border-orange-500 hover:text-orange-400"><span class="hidden sm:inline">Next</span><i class="fa-solid fa-chevron-right text-xs"></i></a></nav>

                <!-- Empty State: Keep separate for future conditional rendering. -->
                <section id="empty-orders" class="hidden rounded-2xl border border-gray-800 bg-gray-900 px-6 py-14 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-orange-500/15 text-2xl text-orange-400"><i class="fa-solid fa-box-open"></i></div>
                    <h2 class="mt-5 text-2xl font-bold text-white">No orders found</h2>
                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-gray-400">You have not placed any orders yet. Find something you love and it will appear here.</p><a href="/products" class="mt-6 inline-flex items-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400">Continue Shopping <i class="fa-solid fa-arrow-right"></i></a>
                </section>
            </div>
        </div>
    </div>
</main>