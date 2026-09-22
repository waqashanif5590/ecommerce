<aside class="rounded-2xl border border-gray-800 bg-gray-900 p-5 lg:sticky lg:top-24">
    <div class="flex items-center gap-4 border-b border-gray-800 pb-5">
        <x-avatar />
        <div class="min-w-0">
            <h2 class="truncate font-semibold text-white">{{Auth::user()->name}}</h2>
            <p class="truncate text-sm text-gray-400">{{Auth::user()->email}}</p>
        </div>
    </div>

    <nav aria-label="Account navigation" class="mt-5 overflow-x-auto">
        <ul class="flex min-w-max gap-2 lg:min-w-0 lg:flex-col">
            <li>
                <a href="{{route('user.dashboard')}}" aria-current="page" class="flex items-center gap-3 rounded-lg {{request()->routeIs('user.dashboard*')?'bg-orange-500 shadow-lg shadow-orange-500/10':''}} px-4 py-3 text-sm font-semibold text-white hover:bg-gray-800 hover:text-orange-400"><i class="fa-solid fa-chart-line w-4 text-center"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{route('all.orders')}}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-white transition-colors {{request()->routeIs('all.orders*')?'bg-orange-500 shadow-lg shadow-orange-500/10':''}} hover:bg-gray-800 hover:text-orange-400"><i class="fa-solid fa-box w-4 text-center"></i>My Orders</a>
            </li>
            <li>
                <a href="{{route('wishlist')}}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-white transition-colors {{request()->routeIs('wishlist*')?'bg-orange-500 shadow-lg shadow-orange-500/10':''}} hover:bg-gray-800 hover:text-orange-400"><i class="fa-solid fa-heart w-4 text-center"></i>Wishlist</a>
            </li>
            <li>
                <a href="{{route('cart')}}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-white transition-colors {{request()->routeIs('cart*')?'bg-orange-500 shadow-lg shadow-orange-500/10':''}} hover:bg-gray-800 hover:text-orange-400"><i class="fa-solid fa-shopping-cart w-4 text-center"></i>My Cart</a>
            </li>
            <li>
                <a href="{{route('profile')}}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-white transition-colors {{request()->routeIs('profile*')?'bg-orange-500 shadow-lg shadow-orange-500/10':''}} hover:bg-gray-800 hover:text-orange-400"><i class="fa-solid fa-user w-4 text-center"></i>My Profile</a>
            </li>
            <li>
                <a href="{{route('user.address')}}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-white transition-colors {{request()->routeIs('user.address*')?'bg-orange-500 shadow-lg shadow-orange-500/10':''}} hover:bg-gray-800 hover:text-orange-400"><i class="fa-solid fa-location-dot w-4 text-center"></i>Addresses</a>
            </li>
            <li>
                <button type="button" class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left text-sm font-medium text-gray-400  transition-all duration-200 border border-gray-700 hover:border-red-500 hover:bg-red-500/10 hover:text-red-400"><i class="fa-solid fa-right-from-bracket w-4 text-center"></i>Logout</button>
            </li>
        </ul>
    </nav>
</aside>