<main class="min-h-screen bg-gray-950 px-4 py-8 text-gray-300 sm:px-6 lg:px-8 lg:py-10">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-8 lg:grid-cols-[220px_minmax(0,1fr)]">
            <x-admin.admin-sidebar />

            <div class="min-w-0 space-y-8">
                <header class="flex flex-col justify-between gap-5 border-b border-gray-800 pb-7 sm:flex-row sm:items-end">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-orange-400">{{ now()->format('l, F j, Y') }}</p>
                        <h2 class="mt-2 text-3xl font-black tracking-tight text-white sm:text-4xl">Reports &amp; Analytics</h2>
                        <p class="mt-2 text-sm text-gray-500">Review your store performance with a simple, focused report.</p>
                    </div>
                    <button type="button" onclick="window.print()" class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-700 px-4 py-3 text-sm font-semibold text-gray-300 transition-colors hover:border-orange-500 hover:text-white">
                        <i class="fa-solid fa-print"></i>
                        Print Report
                    </button>
                </header>

                <section aria-labelledby="report-period" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                    <div class="flex flex-col justify-between gap-5 xl:flex-row xl:items-end">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Report period</p>
                            <h3 id="report-period" class="mt-1 text-xl font-bold text-white">Choose a date range</h3>
                            <p class="mt-2 text-sm text-gray-500">Use a preset or choose the dates you want to review.</p>
                        </div>
                        <div class="flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:items-end">
                            <label class="block text-sm font-medium text-gray-400">
                                <span class="mb-2 block">Range</span>
                                <select name="range" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-3 py-3 text-sm text-white outline-none transition-colors focus:border-orange-500 sm:w-44">
                                    <option>Today</option>
                                    <option>Last 7 days</option>
                                    <option>Last 30 days</option>
                                    <option>This month</option>
                                    <option>Last month</option>
                                    <option>This year</option>
                                    <option>Custom range</option>
                                </select>
                            </label>
                            <label class="block text-sm font-medium text-gray-400">
                                <span class="mb-2 block">From</span>
                                <span class="relative block">
                                    <i class="fa-solid fa-calendar-days pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-orange-400"></i>
                                    <input type="date" name="from" value="2026-09-01" class="w-full rounded-xl border border-gray-700 bg-gray-950 py-3 pl-10 pr-3 text-sm text-white outline-none transition-colors focus:border-orange-500">
                                </span>
                            </label>
                            <label class="block text-sm font-medium text-gray-400">
                                <span class="mb-2 block">To</span>
                                <span class="relative block">
                                    <i class="fa-solid fa-calendar-days pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-orange-400"></i>
                                    <input type="date" name="to" value="2026-09-23" class="w-full rounded-xl border border-gray-700 bg-gray-950 py-3 pl-10 pr-3 text-sm text-white outline-none transition-colors focus:border-orange-500">
                                </span>
                            </label>
                            <button type="button" class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400">
                                <i class="fa-solid fa-file-lines"></i>
                                Generate Report
                            </button>
                        </div>
                    </div>
                </section>

                <section aria-label="Report summary" class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <x-admin.performance-card title="Total Revenue" value="PKR 842,490" description="For the selected period" growth="+18.5%" text="text-emerald-400" icon="fa-wallet" />
                    <x-admin.performance-card title="Total Orders" value="1,284" description="Completed and processing" growth="+8.6%" text="text-emerald-400" icon="fa-cart-shopping" />
                    <x-admin.performance-card title="Average Order Value" value="PKR 656" description="Average per completed order" growth="+6.2%" text="text-emerald-400" icon="fa-receipt" />
                    <x-admin.performance-card title="New Customers" value="356" description="Joined during this period" growth="+12.3%" text="text-emerald-400" icon="fa-user-plus" />
                </section>

                <section class="grid gap-8 xl:grid-cols-[minmax(0,1.55fr)_minmax(300px,0.85fr)]">
                    <x-admin.sales-performance-graph />
                    <x-admin.category-performance-graph />
                </section>

                <section class="grid gap-8 md:grid-cols-2">
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Order health</p>
                        <h3 class="mt-1 text-xl font-bold text-white">Order status summary</h3>
                        <div class="mt-6 space-y-4">
                            <div class="flex items-center justify-between text-sm"><span class="flex items-center gap-2 text-gray-400"><i class="fa-solid fa-circle text-emerald-400"></i>Completed</span><strong class="text-white">842</strong></div>
                            <div class="h-2 rounded-full bg-gray-800"><div class="h-2 w-[66%] rounded-full bg-emerald-400"></div></div>
                            <div class="flex items-center justify-between text-sm"><span class="flex items-center gap-2 text-gray-400"><i class="fa-solid fa-circle text-sky-400"></i>Processing</span><strong class="text-white">286</strong></div>
                            <div class="h-2 rounded-full bg-gray-800"><div class="h-2 w-[22%] rounded-full bg-sky-400"></div></div>
                            <div class="flex items-center justify-between text-sm"><span class="flex items-center gap-2 text-gray-400"><i class="fa-solid fa-circle text-rose-400"></i>Cancelled</span><strong class="text-white">156</strong></div>
                            <div class="h-2 rounded-full bg-gray-800"><div class="h-2 w-[12%] rounded-full bg-rose-400"></div></div>
                        </div>
                    </article>

                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Customer insights</p>
                        <h3 class="mt-1 text-xl font-bold text-white">Customer insights</h3>
                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <div class="rounded-xl bg-gray-950 p-4"><p class="text-xs text-gray-500">Returning customers</p><p class="mt-2 text-2xl font-black text-white">68%</p><p class="mt-1 text-xs text-emerald-400">+4.8% this period</p></div>
                            <div class="rounded-xl bg-gray-950 p-4"><p class="text-xs text-gray-500">New sign ups</p><p class="mt-2 text-2xl font-black text-white">356</p><p class="mt-1 text-xs text-emerald-400">+12.3% this period</p></div>
                            <div class="rounded-xl bg-gray-950 p-4"><p class="text-xs text-gray-500">Repeat purchase rate</p><p class="mt-2 text-2xl font-black text-white">42%</p><p class="mt-1 text-xs text-sky-400">Healthy customer loyalty</p></div>
                            <div class="rounded-xl bg-gray-950 p-4"><p class="text-xs text-gray-500">Top location</p><p class="mt-2 text-lg font-black text-white">Lahore</p><p class="mt-1 text-xs text-gray-500">28% of all orders</p></div>
                        </div>
                    </article>
                </section>

                <section class="grid gap-8 md:grid-cols-2">
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Top performers</p>
                                <h3 class="mt-1 text-xl font-bold text-white">Top selling products</h3>
                            </div>
                            <i class="fa-solid fa-arrow-trend-up text-orange-400"></i>
                        </div>
                        <div class="mt-6 space-y-5">
                            <div class="flex items-center gap-4"><div class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-500/10 text-orange-400"><i class="fa-solid fa-shoe-prints"></i></div><div class="min-w-0 flex-1"><div class="flex justify-between gap-3 text-sm"><p class="truncate font-semibold text-white">Velocity Runner Pro</p><span class="text-gray-500">248 sold</span></div><div class="mt-2 h-1.5 rounded-full bg-gray-800"><div class="h-1.5 w-[84%] rounded-full bg-orange-500"></div></div></div></div>
                            <div class="flex items-center gap-4"><div class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-500/10 text-sky-400"><i class="fa-solid fa-shoe-prints"></i></div><div class="min-w-0 flex-1"><div class="flex justify-between gap-3 text-sm"><p class="truncate font-semibold text-white">Cloud Street Low</p><span class="text-gray-500">193 sold</span></div><div class="mt-2 h-1.5 rounded-full bg-gray-800"><div class="h-1.5 w-[66%] rounded-full bg-sky-400"></div></div></div></div>
                            <div class="flex items-center gap-4"><div class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400"><i class="fa-solid fa-shoe-prints"></i></div><div class="min-w-0 flex-1"><div class="flex justify-between gap-3 text-sm"><p class="truncate font-semibold text-white">Summit Trail GTX</p><span class="text-gray-500">156 sold</span></div><div class="mt-2 h-1.5 rounded-full bg-gray-800"><div class="h-1.5 w-[52%] rounded-full bg-violet-400"></div></div></div></div>
                        </div>
                    </article>

                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Category breakdown</p>
                        <h3 class="mt-1 text-xl font-bold text-white">Category performance</h3>
                        <div class="mt-6 space-y-5">
                            <div><div class="flex justify-between text-sm"><span class="text-gray-400">Running shoes</span><span class="font-semibold text-white">46%</span></div><div class="mt-2 h-2 rounded-full bg-gray-800"><div class="h-2 w-[46%] rounded-full bg-orange-500"></div></div></div>
                            <div><div class="flex justify-between text-sm"><span class="text-gray-400">Casual shoes</span><span class="font-semibold text-white">30%</span></div><div class="mt-2 h-2 rounded-full bg-gray-800"><div class="h-2 w-[30%] rounded-full bg-sky-400"></div></div></div>
                            <div><div class="flex justify-between text-sm"><span class="text-gray-400">Accessories</span><span class="font-semibold text-white">24%</span></div><div class="mt-2 h-2 rounded-full bg-gray-800"><div class="h-2 w-[24%] rounded-full bg-violet-400"></div></div></div>
                        </div>
                    </article>
                </section>

                <section class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Inventory watch</p>
                            <h3 class="mt-1 text-xl font-bold text-white">Low stock products</h3>
                        </div>
                        <i class="fa-solid fa-boxes-stacked text-orange-400"></i>
                    </div>
                    <div class="mt-6 grid gap-3 sm:grid-cols-3">
                        <div class="flex items-center justify-between rounded-xl bg-gray-950 p-4"><span class="text-sm font-semibold text-white">Velocity Runner Pro</span><span class="text-xs font-bold text-rose-400">4 left</span></div>
                        <div class="flex items-center justify-between rounded-xl bg-gray-950 p-4"><span class="text-sm font-semibold text-white">Summit Trail GTX</span><span class="text-xs font-bold text-rose-400">7 left</span></div>
                        <div class="flex items-center justify-between rounded-xl bg-gray-950 p-4"><span class="text-sm font-semibold text-white">Everyday Crew Socks</span><span class="text-xs font-bold text-amber-400">9 left</span></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
