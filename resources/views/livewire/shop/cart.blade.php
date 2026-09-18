<main>
    @if($cartItems->isNotEmpty())
    <!-- Cart heading -->
    <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <span class="rounded-xl bg-[rgb(163_77_9/23%)] px-3 py-1 text-sm font-medium text-orange-400">Your Cart</span>
            <h1 class="mt-5 text-4xl font-bold tracking-tight text-white sm:text-5xl">Shopping Cart</h1>
            <p class="mt-3 text-gray-400">Review your selected items before checkout.</p>
            <p class="mt-5 text-sm text-gray-500"><span class="font-semibold text-white">{{$cartItems->count('quantity')}} items</span> in your cart</p>
        </div>
    </section>

    <!-- Cart items and order summary -->
    <section class="border-y border-gray-800 bg-gray-900 px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto grid max-w-7xl items-start gap-8 lg:grid-cols-[minmax(0,1.55fr)_minmax(19rem,0.75fr)] lg:gap-12">
            <div>
                <div class="mb-5 flex items-end justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium uppercase tracking-widest text-orange-400">Cart items</p>
                        <h2 class="mt-1 text-2xl font-bold text-white">Your selections</h2>
                    </div>
                    <button wire:click="confirmClearCart({{Auth::id()}})" aria-label="Clear cart" class="text-sm text-gray-400 transition-colors hover:text-orange-400">Clear cart</button>
                </div>
                
                <x-modals.confirmation-modal
                    wire:key="clear-cart-modal"
                    name="clear-cart"
                    title="Clear Cart"
                    message="Are you sure you want to clear your cart? This action cannot be undone."
                    confirmText="Clear Cart" />

                <!-- Cart item -->
                @foreach($cartItems as $cartItem)
                <div wire:key="cart-item-{{ $cartItem->id }}">
                    <x-shop.cart-item :cartItem="$cartItem" />
                </div>
                @endforeach
                <x-modals.confirmation-modal
                    wire:key="remove-cart-item-modal"
                    name="remove-cart-item"
                    title="Remove Item"
                    message="Are you sure you want to remove this item from your cart? This action cannot be undone."
                    confirmText="Remove" />


                <a href="/index.html" class="mt-6 inline-flex items-center gap-2 rounded-xl border border-gray-700 px-5 py-3 text-sm font-medium text-gray-300 transition-all duration-200 hover:-translate-y-0.5 hover:border-orange-500 hover:text-orange-400"><i class="fa-solid fa-arrow-left"></i> Continue Shopping</a>
            </div>

            <!-- Order summary -->
            <x-shop.order-summary :discount="$discount"
                :totalBill="$totalBill"
                :shipping="$shipping"
                :subTotal="$subTotal" />

        </div>
    </section>

    <!-- Recommended products -->
    <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-white">You May Also Like</h2>
            <p class="mt-2 text-gray-400">Fresh styles to complete your rotation</p>
        </div>
        <div class="cards-container mx-auto mt-12 grid max-w-7xl grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:mt-16">
            @foreach($products as $product)
            <x-shop.product-card :product="$product" />
            @endforeach
        </div>
    </section>
    @endif

    @if($cartItems->isEmpty())
    <!-- Empty cart alternative: enable this section when the cart has no items. -->

    <section class="mx-auto max-w-2xl px-4 py-24 text-center sm:px-6"><i class="fa-solid fa-cart-shopping text-5xl text-orange-400"></i>
        <h1 class="mt-6 text-3xl font-bold text-white">Shopping Cart is Empty</h1>
        <p class="mt-3 text-gray-400">You haven't added anything to your cart yet.</p><a href="{{route('products')}}" class="mt-8 inline-block rounded-xl bg-orange-500 px-6 py-3 font-semibold text-white">Start Shopping</a>
    </section>
    @endif

</main>