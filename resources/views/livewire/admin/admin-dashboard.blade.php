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
                        <a href="#overview" class="flex items-center gap-3 rounded-xl bg-orange-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-orange-500/10"><i class="fa-solid fa-chart-line w-4 text-center"></i>Overview</a>
                        <a href="#orders" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-receipt w-4 text-center"></i>Orders <span class="ml-auto rounded-full bg-orange-500/15 px-2 py-0.5 text-xs text-orange-300">12</span></a>
                        <a href="#products" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-box-open w-4 text-center"></i>Products</a>
                        <a href="#customers" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-users w-4 text-center"></i>Customers</a>
                        <a href="#settings" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-gear w-4 text-center"></i>Settings</a>
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

            <div id="overview" class="min-w-0 space-y-8">
                <header class="flex flex-col justify-between gap-5 border-b border-gray-800 pb-7 sm:flex-row sm:items-end">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-orange-400">Monday, September 21, 2026</p>
                        <h2 class="mt-2 text-3xl font-black tracking-tight text-white sm:text-4xl">Good morning, Admin.</h2>
                        <p class="mt-2 text-sm text-gray-500">Here is what is happening with your store today.</p>
                    </div>
                </header>

                <form action="#overview" method="get" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                    <div class="flex flex-col justify-between gap-5 xl:flex-row xl:items-end">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Report period</p>
                            <h3 class="mt-1 text-xl font-bold text-white">Choose a date range</h3>
                            <p class="mt-2 text-sm text-gray-500">Select the dates you want to use for your store report.</p>
                        </div>
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-end">
                            <label class="block text-sm font-medium text-gray-400">
                                <span class="mb-2 block">Start date</span>
                                <span class="relative block">
                                    <i class="fa-solid fa-calendar-days pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-orange-400"></i>
                                    <input type="date" name="start_date" value="2026-06-10" class="rounded-xl border border-gray-700 bg-gray-950 py-3 pl-10 pr-3 text-sm text-white outline-none transition-colors focus:border-orange-500">
                                </span>
                            </label>
                            <label class="block text-sm font-medium text-gray-400">
                                <span class="mb-2 block">End date</span>
                                <span class="relative block">
                                    <i class="fa-solid fa-calendar-days pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-orange-400"></i>
                                    <input type="date" name="end_date" value="2026-08-10" class="rounded-xl border border-gray-700 bg-gray-950 py-3 pl-10 pr-3 text-sm text-white outline-none transition-colors focus:border-orange-500">
                                </span>
                            </label>
                            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400"><i class="fa-solid fa-download"></i>Generate report</button>
                        </div>
                    </div>
                </form>

                <section aria-label="Store performance" class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                        <div class="flex items-start justify-between">
                            <div class="rounded-xl bg-orange-500/15 p-3 text-orange-400"><i class="fa-solid fa-wallet text-lg"></i></div><span class="text-xs font-bold text-emerald-400">+12.8%</span>
                        </div>
                        <p class="mt-5 text-sm text-gray-500">Total revenue</p>
                        <p class="mt-1 text-2xl font-black text-white">PKR 842,490</p>
                        <p class="mt-2 text-xs text-gray-600">Compared with last month</p>
                    </article>
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                        <div class="flex items-start justify-between">
                            <div class="rounded-xl bg-sky-500/15 p-3 text-sky-400"><i class="fa-solid fa-cart-shopping text-lg"></i></div><span class="text-xs font-bold text-emerald-400">+8.4%</span>
                        </div>
                        <p class="mt-5 text-sm text-gray-500">Total orders</p>
                        <p class="mt-1 text-2xl font-black text-white">1,284</p>
                        <p class="mt-2 text-xs text-gray-600">Across all channels</p>
                    </article>
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                        <div class="flex items-start justify-between">
                            <div class="rounded-xl bg-violet-500/15 p-3 text-violet-400"><i class="fa-solid fa-user-plus text-lg"></i></div><span class="text-xs font-bold text-emerald-400">+18.2%</span>
                        </div>
                        <p class="mt-5 text-sm text-gray-500">New customers</p>
                        <p class="mt-1 text-2xl font-black text-white">356</p>
                        <p class="mt-2 text-xs text-gray-600">Since the start of the month</p>
                    </article>
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                        <div class="flex items-start justify-between">
                            <div class="rounded-xl bg-rose-500/15 p-3 text-rose-400"><i class="fa-solid fa-boxes-stacked text-lg"></i></div><span class="text-xs font-bold text-rose-400">Needs attention</span>
                        </div>
                        <p class="mt-5 text-sm text-gray-500">Low stock items</p>
                        <p class="mt-1 text-2xl font-black text-white">18</p>
                        <p class="mt-2 text-xs text-gray-600">Products below 10 units</p>
                    </article>
                </section>

                <section class="grid gap-8 xl:grid-cols-[minmax(0,1.55fr)_minmax(300px,0.85fr)]">
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-start">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Revenue overview</p>
                                <h3 class="mt-1 text-xl font-bold text-white">Sales performance</h3>
                            </div>
                            <div class="flex items-center gap-4 text-xs text-gray-500"><span class="flex items-center gap-2"><i class="fa-solid fa-circle text-orange-400"></i>Revenue</span><span class="flex items-center gap-2"><i class="fa-solid fa-circle text-gray-600"></i>Orders</span></div>
                        </div>
                        <div class="mt-8 overflow-hidden"><svg viewBox="0 0 720 285" class="h-auto min-w-[620px] w-full" role="img" aria-label="Line graph showing revenue growth over the last seven months">
                                <g stroke="#374151" stroke-dasharray="3 7">
                                    <line x1="55" y1="25" x2="700" y2="25"></line>
                                    <line x1="55" y1="80" x2="700" y2="80"></line>
                                    <line x1="55" y1="135" x2="700" y2="135"></line>
                                    <line x1="55" y1="190" x2="700" y2="190"></line>
                                    <line x1="55" y1="245" x2="700" y2="245"></line>
                                </g>
                                <g fill="#6b7280" font-size="11"><text x="5" y="29">200k</text><text x="5" y="84">150k</text><text x="5" y="139">100k</text><text x="12" y="194">50k</text><text x="27" y="249">0</text><text x="55" y="270">Mar</text><text x="160" y="270">Apr</text><text x="265" y="270">May</text><text x="370" y="270">Jun</text><text x="475" y="270">Jul</text><text x="580" y="270">Aug</text><text x="680" y="270">Sep</text></g>
                                <path d="M55 197 C90 184 120 190 160 158 S230 173 265 135 S335 155 370 112 S440 129 475 91 S545 104 580 68 S650 78 685 38" fill="none" stroke="#f97316" stroke-linecap="round" stroke-width="4"></path>
                                <path d="M55 197 C90 184 120 190 160 158 S230 173 265 135 S335 155 370 112 S440 129 475 91 S545 104 580 68 S650 78 685 38 L685 245 L55 245 Z" fill="url(#revenueFill)" opacity=".18"></path>
                                <g fill="#111827" stroke="#fb923c" stroke-width="3">
                                    <circle cx="55" cy="197" r="5"></circle>
                                    <circle cx="160" cy="158" r="5"></circle>
                                    <circle cx="265" cy="135" r="5"></circle>
                                    <circle cx="370" cy="112" r="5"></circle>
                                    <circle cx="475" cy="91" r="5"></circle>
                                    <circle cx="580" cy="68" r="5"></circle>
                                    <circle cx="685" cy="38" r="5"></circle>
                                </g>
                                <defs>
                                    <linearGradient id="revenueFill" x1="0" x2="0" y1="0" y2="1">
                                        <stop offset="0" stop-color="#f97316"></stop>
                                        <stop offset="1" stop-color="#f97316" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg></div>
                    </article>

                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Order mix</p>
                            <h3 class="mt-1 text-xl font-bold text-white">Sales by category</h3>
                        </div>
                        <div class="mt-7 flex justify-center"><svg viewBox="0 0 200 200" class="h-48 w-48" role="img" aria-label="Pie chart showing sales by category">
                                <circle cx="100" cy="100" r="72" fill="none" stroke="#374151" stroke-width="32"></circle>
                                <circle cx="100" cy="100" r="72" fill="none" stroke="#f97316" stroke-dasharray="210 452" stroke-dashoffset="0" stroke-width="32" transform="rotate(-90 100 100)"></circle>
                                <circle cx="100" cy="100" r="72" fill="none" stroke="#38bdf8" stroke-dasharray="135 452" stroke-dashoffset="-210" stroke-width="32" transform="rotate(-90 100 100)"></circle>
                                <circle cx="100" cy="100" r="72" fill="none" stroke="#a78bfa" stroke-dasharray="107 452" stroke-dashoffset="-345" stroke-width="32" transform="rotate(-90 100 100)"></circle><text x="100" y="96" fill="white" font-size="22" font-weight="700" text-anchor="middle">1,284</text><text x="100" y="114" fill="#9ca3af" font-size="10" text-anchor="middle">orders</text>
                            </svg></div>
                        <div class="mt-5 space-y-3 text-sm">
                            <div class="flex items-center justify-between"><span class="flex items-center gap-2 text-gray-400"><i class="fa-solid fa-circle text-orange-400"></i>Running shoes</span><strong class="text-white">46%</strong></div>
                            <div class="flex items-center justify-between"><span class="flex items-center gap-2 text-gray-400"><i class="fa-solid fa-circle text-sky-400"></i>Casual shoes</span><strong class="text-white">30%</strong></div>
                            <div class="flex items-center justify-between"><span class="flex items-center gap-2 text-gray-400"><i class="fa-solid fa-circle text-violet-400"></i>Accessories</span><strong class="text-white">24%</strong></div>
                        </div>
                    </article>
                </section>

                <section id="orders" class="rounded-2xl border border-gray-800 bg-gray-900">
                    <div class="flex flex-col justify-between gap-3 border-b border-gray-800 p-5 sm:flex-row sm:items-center sm:p-6">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Needs your attention</p>
                            <h3 class="mt-1 text-xl font-bold text-white">Recent orders</h3>
                        </div><button type="button" class="inline-flex items-center gap-2 text-sm font-semibold text-orange-400 hover:text-orange-300">View all orders <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[650px] text-left text-sm">
                            <thead class="text-xs uppercase tracking-wider text-gray-600">
                                <tr>
                                    <th class="px-6 py-4 font-semibold">Order</th>
                                    <th class="px-6 py-4 font-semibold">Customer</th>
                                    <th class="px-6 py-4 font-semibold">Date</th>
                                    <th class="px-6 py-4 font-semibold">Amount</th>
                                    <th class="px-6 py-4 font-semibold">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800">
                                <tr class="text-gray-300">
                                    <td class="px-6 py-4 font-semibold text-white">#EC-10482</td>
                                    <td class="px-6 py-4">Hassan Raza</td>
                                    <td class="px-6 py-4 text-gray-500">Today, 10:42 AM</td>
                                    <td class="px-6 py-4 font-semibold text-white">PKR 12,400</td>
                                    <td class="px-6 py-4"><span class="rounded-full bg-amber-500/10 px-3 py-1 text-xs font-semibold text-amber-300">Processing</span></td>
                                </tr>
                                <tr class="text-gray-300">
                                    <td class="px-6 py-4 font-semibold text-white">#EC-10481</td>
                                    <td class="px-6 py-4">Ayesha Khan</td>
                                    <td class="px-6 py-4 text-gray-500">Today, 09:18 AM</td>
                                    <td class="px-6 py-4 font-semibold text-white">PKR 8,950</td>
                                    <td class="px-6 py-4"><span class="rounded-full bg-sky-500/10 px-3 py-1 text-xs font-semibold text-sky-300">Shipped</span></td>
                                </tr>
                                <tr class="text-gray-300">
                                    <td class="px-6 py-4 font-semibold text-white">#EC-10480</td>
                                    <td class="px-6 py-4">Usman Ali</td>
                                    <td class="px-6 py-4 text-gray-500">Yesterday, 06:35 PM</td>
                                    <td class="px-6 py-4 font-semibold text-white">PKR 18,200</td>
                                    <td class="px-6 py-4"><span class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-semibold text-emerald-300">Delivered</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section id="products" class="grid gap-8 md:grid-cols-2">
                    <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Top performers</p>
                                <h3 class="mt-1 text-xl font-bold text-white">Best-selling products</h3>
                            </div><i class="fa-solid fa-arrow-trend-up text-orange-400"></i>
                        </div>
                        <div class="mt-6 space-y-5">
                            <div class="flex items-center gap-4">
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange-500/10 text-orange-400"><i class="fa-solid fa-shoe-prints"></i></div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex justify-between gap-3 text-sm">
                                        <p class="truncate font-semibold text-white">Velocity Runner Pro</p><span class="text-gray-500">248 sold</span>
                                    </div>
                                    <div class="mt-2 h-1.5 rounded-full bg-gray-800">
                                        <div class="h-1.5 w-[84%] rounded-full bg-orange-500"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-sky-500/10 text-sky-400"><i class="fa-solid fa-shoe-prints"></i></div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex justify-between gap-3 text-sm">
                                        <p class="truncate font-semibold text-white">Cloud Street Low</p><span class="text-gray-500">193 sold</span>
                                    </div>
                                    <div class="mt-2 h-1.5 rounded-full bg-gray-800">
                                        <div class="h-1.5 w-[66%] rounded-full bg-sky-400"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-500/10 text-violet-400"><i class="fa-solid fa-shoe-prints"></i></div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex justify-between gap-3 text-sm">
                                        <p class="truncate font-semibold text-white">Summit Trail GTX</p><span class="text-gray-500">156 sold</span>
                                    </div>
                                    <div class="mt-2 h-1.5 rounded-full bg-gray-800">
                                        <div class="h-1.5 w-[52%] rounded-full bg-violet-400"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article id="customers" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Customer directory</p>
                                <h3 class="mt-1 text-xl font-bold text-white">Recent customers</h3>
                            </div><button type="button" class="inline-flex items-center gap-2 text-sm font-semibold text-orange-400 hover:text-orange-300">View all customers <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="mt-5 divide-y divide-gray-800">
                            <div class="flex items-center gap-3 py-3 first:pt-0">
                                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-orange-500/15 text-xs font-bold text-orange-300">HR</div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold text-white">Hassan Raza</p>
                                    <p class="text-xs text-gray-500">hassan.raza@example.com</p>
                                </div><span class="text-xs text-gray-500">12 orders</span>
                            </div>
                            <div class="flex items-center gap-3 py-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-sky-500/15 text-xs font-bold text-sky-300">AK</div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold text-white">Ayesha Khan</p>
                                    <p class="text-xs text-gray-500">ayesha.khan@example.com</p>
                                </div><span class="text-xs text-gray-500">9 orders</span>
                            </div>
                            <div class="flex items-center gap-3 py-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-violet-500/15 text-xs font-bold text-violet-300">UA</div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold text-white">Usman Ali</p>
                                    <p class="text-xs text-gray-500">usman.ali@example.com</p>
                                </div><span class="text-xs text-gray-500">8 orders</span>
                            </div>
                            <div class="flex items-center gap-3 py-3">
                                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-emerald-500/15 text-xs font-bold text-emerald-300">SM</div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold text-white">Sara Malik</p>
                                    <p class="text-xs text-gray-500">sara.malik@example.com</p>
                                </div><span class="text-xs text-gray-500">7 orders</span>
                            </div>
                            <div class="flex items-center gap-3 py-3 last:pb-0">
                                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-rose-500/15 text-xs font-bold text-rose-300">BM</div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold text-white">Bilal Mahmood</p>
                                    <p class="text-xs text-gray-500">bilal.mahmood@example.com</p>
                                </div><span class="text-xs text-gray-500">6 orders</span>
                            </div>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </div>
</main>