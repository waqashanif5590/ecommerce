<main class="min-h-screen bg-gray-950 px-4 py-8 text-gray-300 sm:px-6 lg:px-8 lg:py-10">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-8 lg:grid-cols-[220px_minmax(0,1fr)]">
            <x-admin.admin-sidebar :totalOrders="$total_orders" />

            <div class="min-w-0 space-y-8">
                <header class="flex flex-col justify-between gap-5 border-b border-gray-800 pb-7 sm:flex-row sm:items-end">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-orange-400">Admin / Customers</p>
                        <h2 class="mt-2 text-3xl font-black tracking-tight text-white sm:text-4xl">Customer directory</h2>
                        <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-500">Keep track of every customer in one place, understand who is engaging with your store, and use their order history to prioritize follow-up.</p>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <i class="fa-solid fa-calendar-days text-orange-400"></i>
                        <span>{{ now()->format('F Y') }}</span>
                    </div>
                </header>

                <section aria-label="Customer overview" class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-400">Total customers</p>
                            <i class="fa-solid fa-users text-orange-400"></i>
                        </div>
                        <p class="mt-4 text-3xl font-black text-white">{{ number_format($total_customers) }}</p>
                        <p class="mt-2 text-xs text-gray-500">All registered customer accounts</p>
                    </article>
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-400">New this month</p>
                            <i class="fa-solid fa-user-plus text-sky-400"></i>
                        </div>
                        <p class="mt-4 text-3xl font-black text-white">{{ number_format($new_customers) }}</p>
                        <p class="mt-2 text-xs text-gray-500">Accounts created since {{ now()->startOfMonth()->format('M j') }}</p>
                    </article>
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-400">Customers with orders</p>
                            <i class="fa-solid fa-bag-shopping text-emerald-400"></i>
                        </div>
                        <p class="mt-4 text-3xl font-black text-white">{{ number_format($customers_with_orders) }}</p>
                        <p class="mt-2 text-xs text-gray-500">Customers who have purchased from the store</p>
                    </article>
                </section>

                <section class="rounded-2xl border border-orange-500/20 bg-orange-500/5 p-5 sm:p-6">
                    <div class="flex items-start gap-4">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-orange-500/15 text-orange-300">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-white">A clearer view of customer activity</h3>
                            <p class="mt-1 text-sm leading-6 text-gray-400">Customers are listed with the newest accounts first. Their order totals make it easier to distinguish new sign-ups from returning customers and spot accounts that may need attention.</p>
                        </div>
                    </div>
                </section>

                <x-admin.customer-list :customers="$customers" />
            </div>
        </div>
    </div>
</main>