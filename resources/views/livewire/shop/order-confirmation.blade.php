<main>
    <section class="mx-auto max-w-4xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="rounded-3xl border border-gray-800 bg-gray-950 p-6 shadow-2xl shadow-black/40 sm:p-8 lg:p-10">
            <div class="flex flex-col items-center text-center">
                <div class="flex h-20 w-20 items-center justify-center rounded-full bg-[rgb(163_77_9/15%)] ring-1 ring-orange-500/30">
                    <i class="fa-solid fa-check text-3xl text-orange-400"></i>
                </div>
                <p class="mt-6 text-sm font-medium uppercase tracking-[0.2em] text-orange-400">Order Confirmed</p>
                <h1 class="mt-4 text-4xl font-bold tracking-tight text-white sm:text-5xl">Thank you for your order!</h1>
                <p class="mt-3 max-w-2xl text-base text-gray-400">Your order has been successfully placed.</p>
            </div>

            <div class="mt-8 rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                <p class="text-sm text-gray-400">Order {{'#'.$order->order_number}}</p>
                <p class="mt-2 text-base text-gray-300">We’ll process your order and notify you when it ships.</p>
            </div>

            <div class="mt-10 grid gap-8 lg:grid-cols-[minmax(0,1.2fr)_minmax(19rem,0.8fr)]">
                @foreach($order->items as $item)
                <div class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                    <div class="mb-5 flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-medium uppercase tracking-widest text-orange-400">Order Details</p>
                            <h2 class="mt-1 text-2xl font-bold text-white">Your items</h2>
                        </div>
                    </div>


                    <div class="space-y-4">
                        <div class="flex items-center justify-between gap-4 rounded-xl border border-gray-800 bg-gray-950 p-3">
                            <div>
                                <p class="font-semibold text-white">{{$item->product_name}}</p>
                                <p class="mt-1 text-sm text-gray-400">Size {{$item->variant->size}} • Quantity {{$item->quantity}}</p>
                            </div>
                            <span class="text-sm font-semibold text-white">PKR {{number_format($item->price)}}</span>
                        </div>

                    </div>

                    <div class="mt-6 space-y-3 border-t border-gray-800 pt-5 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Subtotal</span>
                            <span class="text-white">PKR {{number_format($order->subtotal)}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Discount</span>
                            <span class="text-orange-400">-PKR {{number_format($order->discount)}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Shipping</span>
                            <span class="font-medium text-green-400">{{$order->shipping==0?'Free':$order->shipping}}</span>
                        </div>
                        <div class="mt-4 flex justify-between border-t border-gray-800 pt-4 text-base font-bold">
                            <span class="text-white">Total</span>
                            <span class="text-white">PKR {{number_format($order->total)}}</span>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
                    <p class="text-sm font-medium uppercase tracking-widest text-orange-400">Delivery Information</p>
                    <h2 class="mt-1 text-2xl font-bold text-white">Shipping details</h2>

                    <div class="mt-6 space-y-4 text-sm text-gray-300">
                        <div>
                            <p class="text-gray-500">Delivering to:</p>
                            <p class="mt-2 font-medium text-white">{{$order->shipping_name}}</p>
                        </div>
                        <div>
                            <p>{{$order->shipping_address}}</p>
                            <p>{{$order->shipping_city}}, {{$order->shipping_province}}</p>
                            <p>{{$order->shipping_postal_code}}</p>
                        </div>
                        <div class="border-t border-gray-800 pt-4">
                            <p class="text-gray-500">Payment Method</p>
                            <p class="mt-2 font-medium text-white">{{$order->payment->method==='cod'?'Cash on Delivery':'Online Payment'}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-10 flex flex-col gap-3 sm:flex-row sm:justify-center">
                <a href="{{route('all.orders')}}" class="inline-flex items-center justify-center rounded-xl border border-orange-500 bg-orange-500 px-5 py-3.5 text-sm font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:bg-orange-400">
                    View My Orders
                </a>
                <a href="{{route('products')}}" class="inline-flex items-center justify-center rounded-xl border border-gray-700 bg-transparent px-5 py-3.5 text-sm font-semibold text-gray-200 transition-all duration-200 hover:border-orange-500 hover:text-orange-400">
                    Continue Shopping
                </a>
            </div>
        </div>
    </section>
</main>