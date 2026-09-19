<div>
    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-14">
        <nav class="mb-7 flex items-center gap-2 text-xs text-gray-500" aria-label="Breadcrumb">
            <a href="/index.html" class="hover:text-orange-400">Home</a><i
                class="fa-solid fa-chevron-right text-[10px]"></i><a href="#"
                class="hover:text-orange-400">{{$product->category->title}}</a><i class="fa-solid fa-chevron-right text-[10px]"></i><span
                class="text-gray-300">{{$product->name}}</span>
        </nav>

        <div class="grid gap-10 lg:grid-cols-2 lg:items-start lg:gap-16">
            <div class="lg:sticky lg:top-24">
                <div
                    class="relative aspect-square overflow-hidden rounded-2xl border border-gray-800 bg-gray-900 sm:aspect-[1.08] lg:aspect-square">
                    @if($product->badge!=NULL)
                    <span
                        class="absolute left-4 top-4 z-10 rounded-full bg-orange-500 px-3 py-1 text-xs font-bold uppercase tracking-wide text-white">{{$product->badge}}</span>
                    @endif
                    <button type="button" wire:click="addToWishlist({{$product->id}})" aria-label="Add Velocity Runner Pro to wishlist"
                        class="absolute right-4 top-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-black/60 text-white transition-colors hover:bg-orange-500"><i
                            class="fa-regular fa-heart"></i></button>
                    <img src="{{asset('/images/'.$product->primaryImage->image)}}" alt="Velocity Runner Pro running shoes"
                        class="h-full w-full object-cover">
                </div>
                <div class="mt-3 grid grid-cols-4 gap-3">
                    @foreach($product->images as $image)
                    <button type="button" aria-label="View front product image"
                        class="aspect-square overflow-hidden rounded-xl border-2 border-orange-500 bg-gray-900"><img
                            src="{{asset('/images/'.$image->image)}}" alt="" class="h-full w-full object-cover"></button>
                    @endforeach
                </div>
            </div>

            <div>
                <p class="text-sm font-medium uppercase tracking-[0.2em] text-orange-400">Performance Running</p>
                <h1 class="mt-3 text-3xl font-bold tracking-tight text-white sm:text-4xl">{{$product->name}}</h1>
                <div class="mt-4 flex flex-wrap items-center gap-x-4 gap-y-2">
                    <div class="flex items-center gap-1 text-orange-400" aria-label="Rated 4.9 out of 5 stars"><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><span
                            class="ml-1 text-sm font-semibold text-white">{{number_format($product->average_rating,1)}}</span></div>
                    <a href="#reviews"
                        class="text-sm text-gray-400 underline decoration-gray-700 underline-offset-4 hover:text-orange-400">{{count($product->reviews)}}
                        reviews</a>
                    @if($selectedVariant && $selectedVariant->quantity > 0)
                    <span class="text-sm text-green-400">
                        <i class="fa-solid fa-circle-check mr-1 text-xs"></i>
                        In stock
                    </span>
                    @else
                    <span class="text-sm text-red-400">
                        <i class="fa-solid fa-circle-xmark mr-1 text-xs"></i>
                        Out of stock
                    </span>
                    @endif
                </div>
                <div class="mt-6 flex items-end gap-3"><span class="text-3xl font-bold text-white"> {{number_format($product->discounted_price)}}</span><span
                        class="text-lg text-gray-500 line-through">{{$product->formatted_price}}</span><span
                        class="rounded bg-orange-500/15 px-2 py-1 text-xs font-bold text-orange-400">Save {{$product->total_discount>0?$product->total_discount:0}} %</span>
                </div>
                <p class="mt-5 leading-7 text-gray-400">{{$product->description}}</p>

                <div class="mt-7 border-t border-gray-800 pt-6">
                    <div class="flex items-center justify-between">
                        <label for="size"
                            class="font-semibold text-white">Select size</label>
                        <a href="#size-guide"
                            class="text-sm text-orange-400 hover:text-orange-300">Size guide
                            <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-xs"></i>
                        </a>
                    </div>
                    <div id="size" class="mt-3 grid grid-cols-4 gap-2 sm:grid-cols-6">
                        @foreach($product->variants as $variant)
                        <button type="button" wire:click="selectVariant({{$variant->id}})"
                            class="rounded-lg border {{$selectedVariantId==$variant->id?'border-orange-500':'border-gray-700'}} bg-orange-500/10 py-3 text-sm font-semibold text-orange-400">US {{$variant->size}}</button>
                        @endforeach

                    </div>

                </div>

                <div class="mt-7 flex gap-3">
                    <div class="flex h-12 items-center rounded-xl border border-gray-700">
                        <button type="button" wire:click="setQuantity('min')" wire:loading.attr="disabled" wire:target="setQuantity('min')" aria-label="Decrease quantity" class="h-full w-10 text-gray-400 hover:text-orange-400">&minus;</button>
                        <span class="w-14 text-center text-sm bg-gray-950 outline-none border-none text-white">{{$quantity}}</span>
                        <button type="button" wire:click="setQuantity('plus')" wire:loading.attr="disabled" wire:target="setQuantity('plus')" aria-label="Increase quantity" class="h-full w-10 text-gray-400 hover:text-orange-400">+</button>
                    </div>
                    <button
                        type="button"
                        wire:click="addToCart"
                        @disabled(!$selectedVariant || $selectedVariant->quantity<1)
                            class="flex h-12 flex-1 items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 font-bold text-white shadow-lg shadow-orange-500/20 transition-all hover:-translate-y-0.5 hover:bg-orange-400 disabled:cursor-not-allowed disabled:opacity-50 disabled:hover:translate-y-0">
                            <i class="fa-solid fa-cart-plus"></i>
                            {{ $selectedVariant && $selectedVariant->quantity > 0 ? 'Add to cart' : 'Out of stock' }}
                    </button>
                </div>
                <button type="button" wire:click="addToWishlist({{$product->id}})"
                    class="mt-3 flex h-12 w-full items-center justify-center gap-2 rounded-xl border border-gray-700 font-semibold text-gray-200 transition-colors hover:border-orange-500 hover:text-orange-400"><i
                        class="fa-regular fa-heart"></i>Add to wishlist</button>
                <div class="mt-8 grid gap-4 border-t border-gray-800 pt-6 text-sm">
                    <p class="text-gray-200"><i class="fa-solid fa-truck mr-3 w-4 text-orange-400"></i>
                        <span class="font-medium">Free delivery</span> on orders over $75
                    </p>
                    <p class="text-gray-200"><i class="fa-solid fa-rotate-left mr-3 w-4 text-orange-400"></i>
                        <span class="font-medium">60-day returns</span> with no questions asked
                    </p>
                    <p class="text-gray-200"><i class="fa-solid fa-shield-halved mr-3 w-4 text-orange-400"></i>
                        <span class="font-medium">Secure payments</span> protected every step
                    </p>
                </div>
            </div>
        </div>
    </section>

    <x-shop.product-properties />

    <section id="reviews" class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-medium uppercase tracking-widest text-orange-400">Customer feedback</p>
                <h2 class="mt-2 text-2xl font-bold text-white">Loved by runners</h2>
            </div><button wire:click="$dispatch('open-modal', { name: 'write-review' })" class="text-sm font-medium text-orange-400 hover:text-orange-300">Write a review <i
                    class="fa-solid fa-arrow-right ml-1"></i></button>
        </div>
        <x-shop.product-reviews :product="$product" />
        <x-modals.write-review-modal name="write-review" :product="$product" />
    </section>

    <section class="border-t border-gray-800 bg-gray-900 px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
        <div class="mx-auto max-w-7xl">
            <div class="flex items-end justify-between gap-4">
                <div>
                    <p class="text-sm font-medium uppercase tracking-widest text-orange-400">Keep exploring</p>
                    <h2 class="mt-2 text-2xl font-bold text-white">You may also like</h2>
                </div><a href="/index.html" class="text-sm text-gray-400 hover:text-orange-400">View all <i
                        class="fa-solid fa-arrow-right ml-1"></i></a>
            </div>
            <div class="cards-container mx-auto mt-12 grid max-w-7xl grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:mt-16">
                @foreach($all_products as $product)
                <x-shop.product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

</div>