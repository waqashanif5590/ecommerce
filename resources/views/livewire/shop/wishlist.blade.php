<main class="bg-gray-950 px-4 py-10 text-gray-300 sm:px-6 lg:px-8 lg:py-14">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)] lg:items-start">
            <x-user.dashboard-sidebar />

            <div class="min-w-0">
    @if($wishlists->isNotEmpty())
    <div>
        <!-- All featured styles -->
        <div class="feature-collection border-b border-gray-800 bg-gray-900 px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
            <h1 class="text-3xl text-white font-bold text-center">My Wishlist</h1>
            <p class="text-center text-gray-300 mt-1">Keep track of the products you love and save them
                for your next purchase.</p>
            <div class="cards-container mx-auto mt-12 grid max-w-7xl grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:mt-16">
                @foreach($wishlists as $wishlist)
                <x-shop.product-card :product="$wishlist->product" context="wishlist" />
                @endforeach
            </div>
        </div>
    </div>
    @endif
    @if($wishlists->isEmpty())
    <section class="mx-auto max-w-2xl px-4 py-24 text-center sm:px-6"><i class="fa-solid fa-heart text-5xl text-orange-400"></i>
        <h1 class="mt-6 text-3xl font-bold text-white">Wishlist is Empty</h1>
        <p class="mt-3 text-gray-400">You haven't added anything to your wishlist yet.</p><a href="{{route('products')}}" class="mt-8 inline-block rounded-xl bg-orange-500 px-6 py-3 font-semibold text-white">Start Shopping</a>
    </section>
    @endif

    <!-- New arrivals section -->
    <div class="new-arrivals mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <span
            class="flex w-fit items-center rounded-2xl background-blink px-3 py-1 text-sm font-bold text-green-500">
            <div class="mr-2 h-2 w-2 rounded-full animate-custom-color"></div> Just Droped
        </span>
        <h1 class="mt-4 text-center text-3xl font-bold text-white">New Arrivals</h1>
        <p class="mt-2 text-center text-gray-300">Fresh styles just landed - be the first to rock them</p>
        <a href="" class="mt-3 block text-center text-orange-600">Shop New Arrivals <i
                class="fa-solid fa-chevron-right text-sm pl-1"></i></a>
        <div class="cards-container mx-auto mt-12 grid max-w-7xl grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:mt-16">
            @foreach($newproducts as $product)
            <x-shop.product-card :product="$product" />
            @endforeach
        </div>
    </div>

            </div>
        </div>
    </div>
</main>