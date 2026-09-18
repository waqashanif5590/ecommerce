<main>
    <section class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <div class="mx-auto max-w-3xl text-center">
            <span class="rounded-xl bg-[rgb(163_77_9/23%)] px-3 py-1 text-sm font-medium text-orange-400">Secure Checkout</span>
            <h1 class="mt-5 text-4xl font-bold tracking-tight text-white sm:text-5xl">Checkout</h1>
            <p class="mt-3 text-gray-400">Complete your order with a fast and secure delivery experience.</p>
        </div>
    </section>
    <section class="border-y border-gray-800 bg-gray-950 px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-medium uppercase tracking-widest text-orange-400">Saved addresses</p>
                    <h2 class="mt-1 text-2xl font-bold text-white sm:text-3xl">Where should we deliver?</h2>
                    <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-400">Choose a saved address to fill in your delivery details, or update the fields below before placing your order.</p>
                </div>
                @if($addresses->isNotEmpty())
                <span class="inline-flex w-fit items-center gap-2 rounded-full border border-gray-800 bg-gray-900 px-3 py-1.5 text-xs font-medium text-gray-400">
                    <i class="fa-solid fa-lock text-orange-400" aria-hidden="true"></i>
                    Secure delivery details
                </span>
                @endif
            </div>

            @if($addresses->isNotEmpty())
            <div class="mt-7 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                @foreach($addresses as $address)
                <button
                    type="button"
                    wire:key="checkout-address-{{ $address->id }}"
                    wire:click="selectAddress({{ $address->id }})"
                    aria-pressed="{{ $selectedAddressId === $address->id ? 'true' : 'false' }}"
                    class="group relative flex h-full min-h-52 flex-col rounded-2xl border p-5 text-left outline-none transition duration-300 ease-out hover:-translate-y-1 hover:shadow-xl hover:shadow-orange-950/20 focus-visible:ring-2 focus-visible:ring-orange-400 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-950 {{ $selectedAddressId === $address->id ? 'border-orange-500/70 bg-[rgb(163_77_9/12%)] shadow-lg shadow-orange-950/20' : 'border-gray-800 bg-gray-900 hover:border-orange-500/50' }}">
                    <span class="absolute right-5 top-5 flex h-7 w-7 items-center justify-center rounded-full border {{ $selectedAddressId === $address->id ? 'border-orange-400 bg-orange-500 text-white' : 'border-gray-700 bg-gray-950 text-transparent group-hover:border-orange-500/60' }} transition-colors" aria-hidden="true">
                        <i class="fa-solid fa-check text-xs"></i>
                    </span>

                    <div class="flex items-center gap-3 pr-10">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl {{ $address->type === 'home' ? 'bg-orange-500/15 text-orange-400' : ($address->type === 'office' ? 'bg-blue-500/15 text-blue-300' : 'bg-gray-800 text-gray-400') }}">
                            <i class="fa-solid fa-{{ $address->type === 'home' ? 'house' : ($address->type === 'office' ? 'building' : 'location-dot') }} text-lg" aria-hidden="true"></i>
                        </span>
                        <div class="min-w-0">
                            <p class="font-bold text-white">{{ ucfirst($address->type) }}</p>
                            <p class="mt-0.5 truncate text-xs text-gray-500">{{ $address->getAddressTypeDescriptionAttribute() }}</p>
                        </div>
                    </div>

                    <div class="mt-5 space-y-1 text-sm leading-6 text-gray-400">
                        <p class="font-semibold text-gray-100">{{ $address->name }}</p>
                        <p class="flex items-center gap-2 truncate"><i class="fa-solid fa-phone w-4 text-xs text-gray-600" aria-hidden="true"></i>{{ $address->phone }}</p>
                        <p class="border-t border-gray-800 pt-3">{{ $address->address_line }}</p>
                        <p>{{ $address->city }}, {{ $address->state }} {{ $address->postal_code }}</p>
                    </div>

                    <span class="mt-auto pt-5 text-xs font-semibold uppercase tracking-widest {{ $selectedAddressId === $address->id ? 'text-orange-300' : 'text-gray-500 group-hover:text-orange-400' }} transition-colors">
                        {{ $selectedAddressId === $address->id ? 'Selected for delivery' : 'Use this address' }}
                    </span>
                </button>
                @endforeach
            </div>
            @else
            <div class="mt-7 flex flex-col items-center rounded-2xl border border-dashed border-gray-700 bg-gray-900/70 px-6 py-10 text-center">
                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-500/10 text-orange-400">
                    <i class="fa-solid fa-location-dot text-lg" aria-hidden="true"></i>
                </span>
                <h3 class="mt-4 font-semibold text-white">No saved addresses yet</h3>
                <p class="mt-1 text-sm text-gray-500">Enter your delivery details in the form below to continue.</p>
            </div>
            @endif
        </div>
    </section>

    <section class="border-y border-gray-800 bg-gray-900 px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        <form wire:submit="confirmOrder" class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[minmax(0,1.6fr)_minmax(21rem,0.9fr)] lg:gap-12">
            <div class="space-y-8">
                <div class="rounded-2xl border border-gray-800 bg-gray-950 p-5 sm:p-7">
                    <div class="mb-5">
                        <p class="text-sm font-medium uppercase tracking-widest text-orange-400">Contact Information</p>
                        <h2 class="mt-1 text-2xl font-bold text-white">Reach us</h2>
                    </div>


                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label for="checkout-name" class="mb-2 block text-sm font-medium text-gray-300">Name</label>
                            <input id="checkout-name" type="text" wire:model="name" placeholder="" class="w-full rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-600 transition-colors focus:border-orange-500" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <label for="checkout-email" class="mb-2 block text-sm font-medium text-gray-300">Email</label>
                            <input id="checkout-email" type="email" wire:model="email" value="waqas@gmail.com" placeholder="" class="w-full rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-600 transition-colors focus:border-orange-500" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="checkout-phone" class="mb-2 block text-sm font-medium text-gray-300">Phone</label>
                            <input id="checkout-phone" type="tel" wire:model="phone" placeholder="" class="w-full rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-600 transition-colors focus:border-orange-500" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-gray-800 bg-gray-950 p-5 sm:p-7">
                    <div class="mb-5">
                        <p class="text-sm font-medium uppercase tracking-widest text-orange-400">Shipping Address</p>
                        <h2 class="mt-1 text-2xl font-bold text-white">Delivery details</h2>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
                        <div class="md:col-span-2">
                            <label for="checkout-address" class="mb-2 block text-sm font-medium text-gray-300">Address</label>
                            <input id="checkout-address" type="text" wire:model="address" placeholder="" class="w-full rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-600 transition-colors focus:border-orange-500" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>
                        <div>
                            <label for="checkout-city" class="mb-2 block text-sm font-medium text-gray-300">City</label>
                            <input id="checkout-city" type="text" wire:model="city" placeholder="" class="w-full rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-600 transition-colors focus:border-orange-500" />
                            <x-input-error class="mt-2" :messages="$errors->get('city')" />
                        </div>
                        <div>
                            <label for="checkout-province" class="mb-2 block text-sm font-medium text-gray-300">Province</label>
                            <input id="checkout-province" type="text" wire:model="province" placeholder="" class="w-full rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-600 transition-colors focus:border-orange-500" />
                            <x-input-error class="mt-2" :messages="$errors->get('province')" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="checkout-postal" class="mb-2 block text-sm font-medium text-gray-300">Postal Code</label>
                            <input id="checkout-postal" type="text" wire:model="postal_code" placeholder="" class="w-full rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-600 transition-colors focus:border-orange-500" />
                            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-gray-800 bg-gray-950 p-5 sm:p-7">
                    <div class="mb-5">
                        <p class="text-sm font-medium uppercase tracking-widest text-orange-400">Delivery Method</p>
                        <h2 class="mt-1 text-2xl font-bold text-white">Shipping options</h2>
                    </div>

                    <div class="space-y-3">
                        <label class="flex cursor-pointer items-center justify-between gap-3 rounded-xl border border-gray-700 bg-gray-900 p-4 transition-colors hover:border-orange-500/60">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="delivery-method" wire:model="delivery_option" value="standard" checked class="h-4 w-4 border-gray-600 bg-gray-900 text-orange-500 focus:ring-orange-500" />
                                <div>
                                    <p class="font-medium text-white">Standard Shipping</p>
                                    <p class="text-xs text-gray-400">Estimated 3-5 business days</p>
                                </div>
                            </div>
                            <span class="text-sm font-semibold text-white">Free</span>
                        </label>

                        <label class="flex cursor-pointer items-center justify-between gap-3 rounded-xl border border-gray-700 bg-gray-900 p-4 transition-colors hover:border-orange-500/60">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="delivery-method" wire:model="delivery_option" value="express" class="h-4 w-4 border-gray-600 bg-gray-900 text-orange-500 focus:ring-orange-500" />
                                <div>
                                    <p class="font-medium text-white">Express Shipping</p>
                                    <p class="text-xs text-gray-400">Estimated 1-2 business days</p>
                                </div>
                            </div>
                            <span class="text-sm font-semibold text-orange-400">PKR 300</span>
                        </label>
                    </div>
                </div>

                <div class="rounded-2xl border border-gray-800 bg-gray-950 p-5 sm:p-7">
                    <div class="mb-5">
                        <p class="text-sm font-medium uppercase tracking-widest text-orange-400">Payment Method</p>
                        <h2 class="mt-1 text-2xl font-bold text-white">Choose how you pay</h2>
                    </div>

                    <label class="flex cursor-pointer items-center justify-between gap-3 rounded-xl border border-orange-500/40 bg-[rgb(163_77_9/12%)] p-4">
                        <div class="flex items-center gap-3">
                            <input type="radio" name="payment-method" wire:model="payment_method" value="cod" checked class="h-4 w-4 border-gray-600 bg-gray-900 text-orange-500 focus:ring-orange-500" />
                            <div>
                                <p class="font-medium text-white">Cash on Delivery</p>
                                <p class="text-xs text-gray-400">Pay when your order arrives</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-wallet text-lg text-orange-400"></i>
                    </label>
                </div>
            </div>

            <aside class="rounded-2xl border border-gray-800 bg-gray-950 p-5 sm:p-7 lg:sticky lg:top-24">
                <h2 class="text-2xl font-bold text-white">Order Summary</h2>

                <div class="mt-6 space-y-4">

                    @foreach($cartItems as $cartItem)
                    <div class="flex gap-3 rounded-xl border border-gray-800 bg-gray-900 p-3">
                        <div class="h-16 w-16 shrink-0 rounded-lg bg-gradient-to-br from-orange-500/25 via-gray-700 to-gray-900">
                            <img src="{{asset('/images/'.$cartItem->productVariant->product->primaryImage->image)}}" alt="" class="h-full w-full">
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="font-semibold text-white">{{$cartItem->productVariant->product->name}}</p>
                                    <p class="mt-1 text-xs text-gray-400">Size {{$cartItem->productVariant->size}}</p>
                                </div>
                                <span class="text-sm font-semibold text-white">PKR {{number_format($cartItem->total_price)}}</span>
                            </div>
                            <div class="mt-3 flex items-center justify-between text-xs text-gray-400">
                                <span>Qty: {{$cartItem->quantity}}</span>
                                <span>Item total</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <dl class="mt-6 space-y-4 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-gray-400">Subtotal</dt>
                        <dd class="text-white">PKR {{number_format($subTotal)}}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-400">Discount</dt>
                        <dd class="text-orange-400">- PKR {{number_format($discount)}}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-gray-400">Shipping</dt>
                        <dd class="font-medium text-green-400">Free</dd>
                    </div>
                </dl>

                <div class="my-6 border-t border-gray-800"></div>

                <div class="flex items-end justify-between">
                    <span class="font-semibold text-white">Final Total</span>
                    <span class="text-3xl font-bold text-white">PKR {{number_format($totalBill)}}</span>
                </div>

                <button type="submit"
                    class="mt-7 w-full rounded-xl bg-orange-500 px-5 py-4 font-bold text-white shadow-lg shadow-orange-500/20 transition-all duration-200 hover:-translate-y-0.5 hover:bg-orange-400 hover:shadow-orange-500/30"
                    {{$cartItems->isEmpty() ? 'disabled' : ''}}>
                    Place Order <i class="fa-solid fa-arrow-right-long ml-2"></i>
                </button>

                <p class="mt-3 text-center text-xs text-gray-500">By placing your order, you agree to our terms.</p>
            </aside>
        </form>
        <x-modals.confirmation-modal
            wire:key="confirm-order-modal"
            name="confirm-order"
            title="Confirm Order"
            message="Are you sure you want to place order? Once confirmed cannot be cancelled"
            confirmText="Confirm Order" />

        <!-- Confirm to make address as default -->
        <x-modals.confirmation-modal
            wire:key="confirm-order-modal"
            name="confirm-make-address-default"
            title="Confirm to make address as default"
            message="Do you want to make this address as your default address?"
            confirmText="Yes, Confirm" />
    </section>
</main>