<main class="bg-gray-950 px-4 py-10 text-gray-300 sm:px-6 lg:px-8 lg:py-14">
    <div class="mx-auto max-w-7xl">
        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-orange-400">My account</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Account dashboard</h1>
        </div>

        <div class="grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)] lg:items-start">
            <!-- Account Sidebar -->
            <x-user.dashboard-sidebar />

            <div id="dashboard" class="min-w-0 space-y-8">
                <!-- Welcome Section -->
                <section class="rounded-2xl border border-gray-800 bg-gray-900 p-6 sm:p-8">
                    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-center">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-[0.2em] text-orange-400">Your account at a glance</p>
                            <h2 class="mt-2 text-2xl font-bold text-white sm:text-3xl">Welcome back, {{Auth::user()->user_first_name}}!</h2>
                            <p class="mt-2 max-w-xl text-sm leading-6 text-gray-400">Manage your orders, wishlist, profile and account information from one place.</p>
                        </div>
                        <a href="#orders" class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-gray-900">View orders <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </section>

                <!-- Account Statistics -->
                <section aria-label="Account statistics" class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <a href="#" class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                        <div class="flex items-center justify-between"><i class="fa-solid fa-box-open rounded-xl bg-orange-500/15 p-3 text-lg text-orange-400"></i><span class="text-2xl font-bold text-white">{{Auth::user()->user_total_orders}}</span></div>
                        <p class="mt-5 font-semibold text-white">Total Orders</p>
                        <p class="mt-1 text-sm text-gray-500">All time purchases</p>
                    </a>
                    <a href="#" class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                        <div class="flex items-center justify-between"><i class="fa-solid fa-clock rounded-xl bg-yellow-500/15 p-3 text-lg text-yellow-400"></i><span class="text-2xl font-bold text-white">{{Auth::user()->user_pending_orders}}</span></div>
                        <p class="mt-5 font-semibold text-white">Pending Orders</p>
                        <p class="mt-1 text-sm text-gray-500">Currently in progress</p>
                    </a>
                    <a href="#" class="rounded-2xl border border-gray-800 bg-gray-900 p-5">
                        <div class="flex items-center justify-between"><i class="fa-solid fa-heart rounded-xl bg-orange-500/15 p-3 text-lg text-orange-400"></i><span class="text-2xl font-bold text-white">{{Auth::user()->user_wishlists}}</span></div>
                        <p class="mt-5 font-semibold text-white">Wishlist Items</p>
                        <p class="mt-1 text-sm text-gray-500">Saved for later</p>
                    </a>
                </section>

                <!-- Recent Orders -->
                <section id="orders" class="rounded-2xl border border-gray-800 bg-gray-900">
                    <div class="flex flex-col gap-2 border-b border-gray-800 p-6 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Order history</p>
                            <h2 class="mt-1 text-xl font-bold text-white">Recent Orders</h2>
                        </div><a href="{{route('all.orders')}}" class="text-sm font-medium text-orange-400 transition-colors hover:text-orange-300">View all orders <i class="fa-solid fa-arrow-right ml-1"></i></a>
                    </div>
                    <div class="divide-y divide-gray-800">
                        @foreach($orders as $order)
                        <x-user.order-row :order="$order" />
                        @endforeach
                    </div>
                </section>

                <div class="grid gap-8 xl:grid-cols-2">
                    <!-- Account Information -->
                    <section id="profile" class="rounded-2xl border border-gray-800 bg-gray-900 p-6">
                        <div class="flex items-center justify-between gap-4">
                            <h2 class="text-xl font-bold text-white">Account Information</h2><a href="{{route('profile')}}" class="text-sm font-medium text-orange-400 hover:text-orange-300">Edit Profile</a>
                        </div>
                        <dl class="mt-6 grid gap-5 sm:grid-cols-2">
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-wider text-gray-500">Full Name</dt>
                                <dd class="mt-1 text-sm text-gray-200">{{Auth::user()->name}}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-wider text-gray-500">Email</dt>
                                <dd class="mt-1 break-all text-sm text-gray-200">{{Auth::user()->email}}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-wider text-gray-500">Phone</dt>
                                <dd class="mt-1 text-sm text-gray-200">{{Auth::user()->phone?Auth::user()->phone:'N/A'}}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase tracking-wider text-gray-500">Activity Type</dt>
                                <dd class="mt-1 text-sm text-gray-200">Regular customer</dd>
                            </div>
                        </dl>
                    </section>

                    <!-- Default Address -->
                    <section id="address" class="rounded-2xl border border-gray-800 bg-gray-900 p-6">
                        <div class="flex items-center justify-between gap-4">
                            <h2 class="text-xl font-bold text-white">Default Shipping Address</h2><i class="fa-solid fa-location-dot text-orange-400"></i>
                        </div>
                        <div class="mt-6 space-y-1 text-sm leading-6 text-gray-400">
                            @if($address)
                            <p class="font-semibold text-gray-200">{{$address->name}}</p>
                            <p>{{$address->address_line}}</p>
                            <p>{{$address->city}}, {{$address->state}} {{$address->zip_code}}</p>
                            <p>{{$address->phone}}</p>
                            @else
                            <p class="font-semibold text-gray-200">No default address set</p>
                            @endif
                        </div>

                        <div class="mt-5 flex flex-wrap gap-4"><a href="{{route('user.address')}}" class="text-sm font-medium text-orange-400 hover:text-orange-300">Manage Addresses</a></div>
                    </section>
                </div>

                <!-- Wishlist Preview -->
                <section id="wishlist" class="rounded-2xl border border-gray-800 bg-gray-900 p-6">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Saved favourites</p>
                            <h2 class="mt-1 text-xl font-bold text-white">Wishlist</h2>
                        </div><a href="{{route('wishlist')}}" class="text-sm font-medium text-orange-400 hover:text-orange-300">View wishlist <i class="fa-solid fa-arrow-right ml-1"></i></a>
                    </div>
                    <div class="cards-container mx-auto mt-12 grid max-w-7xl grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:mt-16">
                        @foreach($wishlists as $wishlist)
                        <x-shop.product-card :product="$wishlist->product" context="wishlist" />
                        @endforeach
                    </div>
                </section>

                <!-- Quick Actions -->
                <section aria-label="Quick actions" class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                    <a href="{{route('products')}}" class="flex items-center justify-between rounded-xl border border-gray-800 bg-gray-900 px-5 py-4 font-semibold text-white transition-colors hover:border-orange-500 hover:text-orange-400">
                        <span><i class="fa-solid fa-bag-shopping mr-3 text-orange-400"></i>Continue Shopping</span><i class="fa-solid fa-arrow-right text-sm"></i>
                    </a>
                    <a href="{{route('all.orders')}}" class="flex items-center justify-between rounded-xl border border-gray-800 bg-gray-900 px-5 py-4 font-semibold text-white transition-colors hover:border-orange-500 hover:text-orange-400">
                        <span><i class="fa-solid fa-receipt mr-3 text-orange-400"></i>View Orders
                        </span><i class="fa-solid fa-arrow-right text-sm"></i>
                    </a>
                    <a href="{{route('profile')}}" class="flex items-center justify-between rounded-xl border border-gray-800 bg-gray-900 px-5 py-4 font-semibold text-white transition-colors hover:border-orange-500 hover:text-orange-400">
                        <span><i class="fa-solid fa-user-pen mr-3 text-orange-400"></i>Edit Profile
                        </span><i class="fa-solid fa-arrow-right text-sm"></i>
                    </a>
                </section>
            </div>
        </div>
    </div>
</main>