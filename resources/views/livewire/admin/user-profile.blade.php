<main class="min-h-screen bg-gray-950 px-4 py-8 text-gray-300 sm:px-6 lg:px-8 lg:py-10">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-8 lg:grid-cols-[220px_minmax(0,1fr)]">
            <x-admin.admin-sidebar :totalOrders="$total_orders" />

            <div id="customers" class="min-w-0 space-y-8">
                <header class="flex flex-col justify-between gap-5 border-b border-gray-800 pb-7 sm:flex-row sm:items-end">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-orange-400">Customers / Profile</p>
                        <h2 class="mt-2 text-3xl font-black tracking-tight text-white sm:text-4xl">Customer profile</h2>
                        <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-500">Review account details, order history, and customer activity before taking action on this account.</p>
                    </div>
                    <a href="#orders" class="inline-flex items-center gap-2 text-sm font-semibold text-orange-400 transition-colors hover:text-orange-300"><i class="fa-solid fa-arrow-left"></i>Back to customers</a>
                </header>

                <section id="overview" class="overflow-hidden rounded-2xl border border-gray-800 bg-gray-900">
                    <div class="border-b border-gray-800 bg-gradient-to-r from-orange-500/10 via-gray-900 to-gray-900 p-6 sm:p-8">
                        <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                            <div class="flex items-center gap-4 sm:gap-5">
                                <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-2xl bg-orange-500 text-2xl font-black text-white shadow-lg shadow-orange-500/20">{{$user->getUserNameFirstLetters()}}</div>
                                <div>
                                    <div class="flex flex-wrap items-center gap-3">
                                        <h3 class="text-2xl font-black text-white">{{$user->name}}</h3>
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/15 px-3 py-1 text-xs font-semibold text-emerald-300"><span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>Active</span>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-400">Customer since {{$user->created_at->format('M j, Y')}}</p>
                                    <p class="mt-2 text-sm text-gray-500">Customer ID: CUS-{{$user->id}}</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-3">
                                <button type="button" class="inline-flex items-center gap-2 rounded-xl border border-gray-700 px-4 py-2.5 text-sm font-semibold text-gray-200 transition-colors hover:border-gray-600 hover:bg-gray-800"><i class="fa-solid fa-pen-to-square text-orange-400"></i>Edit profile</button>
                                <button type="button" class="inline-flex items-center gap-2 rounded-xl bg-orange-500 px-4 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-orange-400"><i class="fa-solid fa-envelope"></i>Send message</button>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 divide-x divide-gray-800 sm:grid-cols-4">
                        <div class="p-5 sm:p-6">
                            <p class="text-xs font-semibold uppercase tracking-[0.15em] text-gray-500">Total orders</p>
                            <p class="mt-2 text-2xl font-black text-white">{{$user->getUserTotalOrdersAttribute()}}</p>
                            <p class="mt-1 text-xs text-gray-500">All time</p>
                        </div>
                        <div class="p-5 sm:p-6">
                            <p class="text-xs font-semibold uppercase tracking-[0.15em] text-gray-500">Pending</p>
                            <p class="mt-2 text-2xl font-black text-amber-300">{{$user->getUserPendingOrdersAttribute()}}</p>
                            <p class="mt-1 text-xs text-gray-500">Needs attention</p>
                        </div>
                        <div class="border-t border-gray-800 p-5 sm:border-t-0 sm:p-6">
                            <p class="text-xs font-semibold uppercase tracking-[0.15em] text-gray-500">Completed</p>
                            <p class="mt-2 text-2xl font-black text-emerald-300">{{$user->getUserCompletedOrdersAttribute()}}</p>
                            <p class="mt-1 text-xs text-gray-500">Successfully delivered</p>
                        </div>
                        <div class="border-t border-gray-800 p-5 sm:border-t-0 sm:p-6">
                            <p class="text-xs font-semibold uppercase tracking-[0.15em] text-gray-500">Cancelled</p>
                            <p class="mt-2 text-2xl font-black text-rose-300">{{$user->getUserCancelledOrdersAttribute()}}</p>
                            <p class="mt-1 text-xs text-gray-500">Order cancelled</p>
                        </div>
                    </div>
                </section>

                <div class="grid gap-8 xl:grid-cols-[minmax(0,1.1fr)_minmax(300px,0.9fr)]">
                    <x-user.user-account-info :user="$user" />
                    <x-user.user-default-address-card :address="$address" />
                </div>

                <section id="orders" class="rounded-2xl border border-gray-800 bg-gray-900">
                    <div class="flex flex-col justify-between gap-3 border-b border-gray-800 p-5 sm:flex-row sm:items-center sm:p-6">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Purchase history</p>
                            <h3 class="mt-1 text-xl font-bold text-white">Recent orders</h3>
                        </div>
                        <a href="#orders" class="inline-flex items-center gap-2 text-sm font-semibold text-orange-400 hover:text-orange-300">View all orders <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <x-order.order-row :orders="$orders" />
                </section>

                <div class="grid gap-8 md:grid-cols-2">
                   
                    <x-user.user-recent-activity />
                    <x-admin.account-management />
                </div>
            </div>
        </div>
    </div>
</main>