<div class="min-h-screen bg-gray-950 text-gray-50">
    <!-- Header Section -->
    <div class="border-b border-gray-800 bg-gray-900 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <a href="{{route('all.orders')}}" class="inline-flex items-center text-gray-400 hover:text-orange-500 transition-colors mb-3">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Orders
                    </a>
                </div>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-white mb-1">Order Details</h1>
                <p class="text-gray-400 text-sm">
                    Order #{{ $order->order_number }} • Placed on {{ $order->created_at->format('F j, Y') }} • {{ $order->items->count() }} Items
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Main Content -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Order Status Summary Card -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                    <h2 class="text-lg font-semibold text-white mb-6">Order Status</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Order Status -->
                        <div class="bg-gray-800 rounded-lg p-4">
                            <p class="text-gray-400 text-sm font-medium mb-2">Order Status</p>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-orange-500"></div>
                                <p class="text-white font-semibold">{{ ucfirst($order->status) }}</p>
                            </div>
                        </div>
                        <!-- Payment Status -->
                        <div class="bg-gray-800 rounded-lg p-4">
                            <p class="text-gray-400 text-sm font-medium mb-2">Payment Status</p>
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                <p class="text-white font-semibold">{{ ucfirst($order->payment->status) }}</p>
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="bg-gray-800 rounded-lg p-4">
                            <p class="text-gray-400 text-sm font-medium mb-2">Total</p>
                            <p class="text-white font-semibold text-lg">Rs. {{ number_format($order->total) }}</p>
                        </div>
                        <!-- Estimated Delivery -->
                        <div class="bg-gray-800 rounded-lg p-4">
                            <p class="text-gray-400 text-sm font-medium mb-2">Est. Delivery</p>
                            <p class="text-white font-semibold">{{ $order->estimated_delivery->format('M j, Y') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Order Timeline - The Main Visual Feature -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                    <h2 class="text-lg font-semibold text-white mb-8">Order Progress</h2>

                    <!-- Timeline Container -->
                    <div class="space-y-1">

                        <!-- Timeline Item: Completed (Order Placed) -->
                        <div class="flex gap-6">
                            <!-- Timeline Node -->
                            <!-- Glow effect for current node -->
                            <div class="flex flex-col items-center pt-1">
                                <div class="absolute w-16 h-16 rounded-full {{$order->status === 'pending' ? 'bg-green-500 opacity-20 animate-pulse' : 'bg-gray-700 opacity-0'}}"></div>
                                <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center border-4 border-gray-900 relative z-10">
                                    <i class="fas fa-{{ $order->status === 'pending' ? 'check' : 'clock' }} text-white text-lg"></i>
                                </div>
                                <div class="w-1 bg-green-500 flex-grow" style="min-height: 80px;"></div>
                            </div>
                            <!-- Timeline Content -->
                            <div class="pb-8 pt-1">
                                <h3 class="font-semibold text-white text-base">Order Placed</h3>
                                <p class="text-gray-400 text-sm mt-1">{{ $order->created_at->format('M j, Y') }}</p>
                                <p class="text-gray-600 text-sm mt-2">Your order has been successfully placed.</p>
                            </div>
                        </div>

                        <!-- Timeline Item: Completed (Order Processing) -->
                        <div class="flex gap-6">
                            <div class="flex flex-col items-center pt-1">
                                <div class="absolute w-16 h-16 rounded-full {{$order->status === 'processed' ? 'bg-green-500 opacity-20 animate-pulse' : 'bg-gray-700 opacity-0'}} "></div>
                                <div class="w-12 h-12 rounded-full {{$order->status === 'processing' ? 'bg-green-500' : 'bg-gray-700'}} flex items-center justify-center border-2 border-gray-600 relative z-10">
                                    <i class="fas fa-{{ $order->status === 'processed' ? 'check' : 'clock' }} text-white text-lg"></i>
                                </div>
                                <div class="w-1 {{$order->status === 'processed' ? 'bg-green-500' : 'bg-gray-700'}} flex-grow" style="min-height: 80px;"></div>
                            </div>
                            <div class="pb-8 pt-1">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="font-semibold text-white text-base">Order Processing</h3>
                                    @if (Auth::user()?->role === 'admin')
                                    <button type="button" wire:click="setStatus('processed')" wire:loading.attr="disabled" class="rounded bg-orange-500 px-3 py-1 text-xs font-semibold text-white transition hover:bg-orange-400 disabled:opacity-50">Processed</button>
                                    @endif
                                </div>
                                <p class="text-gray-400 text-sm mt-1">{{ $order->status === 'processed' ? $order->updated_at->format('M j, Y') : 'Not processed yet' }}</p>
                                <p class="text-gray-600 text-sm mt-2">Your order is currently being prepared.</p>
                            </div>
                        </div>

                        <!-- Timeline Item: Current Status (Shipped) -->
                        <div class="flex gap-6">
                            <div class="flex flex-col items-center pt-1">
                                <!-- Glow effect for current status -->
                                <div class="absolute w-16 h-16 rounded-full {{$order->status === 'shipped' ? 'bg-orange-500 opacity-20 animate-pulse' : 'bg-gray-700 opacity-0'}} "></div>
                                <div class="w-12 h-12 rounded-full {{$order->status === 'shipped' ? 'bg-orange-500' : 'bg-gray-700'}} flex items-center justify-center border-2 border-gray-600 relative z-10">
                                    <i class="fas fa-{{ $order->status === 'shipped' ? 'check' : 'box' }} text-white text-lg"></i>
                                </div>
                                <div class="w-1 {{$order->status === 'shipped' ? 'bg-orange-500' : 'bg-gray-700'}} flex-grow" style="min-height: 80px;"></div>
                            </div>
                            <div class="pb-8 pt-1">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="font-semibold text-white text-base">Shipped</h3>
                                    @if (Auth::user()?->role === 'admin')
                                    <button type="button" wire:click="setStatus('shipped')" wire:loading.attr="disabled" class="rounded bg-orange-500 px-3 py-1 text-xs font-semibold text-white transition hover:bg-orange-400 disabled:opacity-50">Shipped</button>
                                    @endif
                                </div>
                                <p class="text-gray-400 text-sm mt-1">{{$order->status === 'shipped' ? $order->updated_at->format('M j, Y') : 'Not shipped yet' }}</p>
                                <p class="text-gray-600 text-sm mt-2">Your order will be handed over to the delivery service.</p>
                            </div>
                        </div>

                        <!-- Timeline Item: Pending (Out for Delivery) -->
                        <div class="flex gap-6">
                            <div class="flex flex-col items-center pt-1">
                                <div class="absolute w-16 h-16 rounded-full {{$order->status === 'out_for_delivery' ? 'bg-blue-500 opacity-20 animate-pulse' : 'bg-gray-700 opacity-0'}} "></div>
                                <div class="w-12 h-12 rounded-full {{$order->status === 'out_for_delivery' ? 'bg-blue-500' : 'bg-gray-700'}} border-2 border-gray-600 flex items-center justify-center relative z-10">
                                    <i class="fas fa-{{ $order->status === 'out_for_delivery' ? 'check' : 'truck' }} text-white text-lg"></i>
                                </div>
                                <div class="w-1 bg-gray-700 flex-grow" style="min-height: 80px;"></div>
                            </div>
                            <div class="pb-8 pt-1">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="font-semibold text-gray-300 text-base">Out for Delivery</h3>
                                    @if (Auth::user()?->role === 'admin')
                                    <button type="button" wire:click="setStatus('out_for_delivery')" wire:loading.attr="disabled" class="rounded bg-orange-500 px-3 py-1 text-xs font-semibold text-white transition hover:bg-orange-400 disabled:opacity-50">Out for Delivery</button>
                                    @endif
                                </div>
                                <p class="text-gray-500 text-sm mt-1">{{$order->status === 'out_for_delivery' ? $order->updated_at->format('M j, Y') : 'Not out for delivery yet' }}</p>
                                <p class="text-gray-600 text-sm mt-2">Your order is on the way.</p>
                            </div>
                        </div>

                        <!-- Timeline Item: Pending (Delivered) -->
                        <div class="flex gap-6">
                            <div class="flex flex-col items-center pt-1">
                                <div class="absolute w-16 h-16 rounded-full {{$order->status === 'delivered' ? 'bg-green-500 opacity-20 animate-pulse' : 'bg-gray-700 opacity-0'}} "></div>
                                <div class="w-12 h-12 rounded-full bg-gray-700 border-2 border-gray-600 flex items-center justify-center relative z-10">
                                    <i class="fas fa-{{ $order->status === 'delivered' ? 'check' : 'box' }} text-gray-400 text-lg"></i>
                                </div>
                                <div class="w-1 bg-gray-700 flex-grow" style="min-height: 80px;"></div>
                            </div>
                            <div class="pt-1">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="font-semibold text-gray-300 text-base">Delivered</h3>
                                    @if (Auth::user()?->role === 'admin')
                                    <button type="button" wire:click="setStatus('delivered')" wire:loading.attr="disabled" class="rounded bg-orange-500 px-3 py-1 text-xs font-semibold text-white transition hover:bg-orange-400 disabled:opacity-50">Delivered</button>
                                    @endif
                                </div>
                                <p class="text-gray-500 text-sm mt-1">{{$order->status === 'delivered' ? $order->updated_at->format('M j, Y') : 'Not delivered yet' }}</p>
                                <p class="text-gray-600 text-sm mt-2">Your order will be delivered to your address.</p>
                            </div>
                        </div>

                        <!-- Timeline Item: Completed (Payment Confirmed) -->
                        <div class="flex gap-6">
                            <div class="flex flex-col items-center pt-1">
                                <div class="absolute w-16 h-16 rounded-full {{$order->status === 'completed' ? 'bg-purple-500 opacity-20 animate-pulse' : 'bg-gray-700 opacity-0'}} "></div>
                                <div class="w-12 h-12 rounded-full bg-gray-700 border-2 border-gray-600 flex items-center justify-center relative z-10">
                                    <i class="fas fa-{{ $order->status === 'completed' ? 'check' : 'clock' }} text-gray-400 text-lg"></i>
                                </div>
                            </div>
                            <div class="pb-8 pt-1">
                                <div class="flex items-center justify-between gap-4">
                                    <h3 class="font-semibold text-white text-base">Payment Confirmed</h3>
                                    @if (Auth::user()?->role === 'admin')
                                    <button type="button" wire:click="setStatus('completed')" wire:loading.attr="disabled" class="rounded bg-orange-500 px-3 py-1 text-xs font-semibold text-white transition hover:bg-orange-400 disabled:opacity-50">Completed</button>
                                    @endif
                                </div>
                                <p class="text-gray-400 text-sm mt-1">{{$order->payment->status === 'paid' ? $order->updated_at->format('M j, Y') : 'Not completed yet' }}</p>
                                <p class="text-gray-600 text-sm mt-2">Your payment has been confirmed.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Order Items Section -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                    <h2 class="text-lg font-semibold text-white mb-6">Order Items</h2>
                    <div class="space-y-4">

                        @foreach($order->items as $item)
                        <!-- Product Item 1 -->
                        <div class="flex gap-4 p-4 bg-gray-800 rounded-lg hover:bg-gray-750 transition-colors">
                            <div class="flex-shrink-0 w-24 h-24 bg-gray-700 rounded-lg overflow-hidden">
                                <img src="{{asset('images/'. $item->product->primaryImage->image)}}" alt="Wireless Headphones" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-semibold text-white">{{$item->product->name}}</h3>
                                <p class="text-gray-400 text-sm mt-1">
                                    <span class="text-gray-500">Color:</span> {{$item->variant->color}}
                                </p>
                                <!-- Size -->
                                <p class="text-gray-400 text-sm mt-1">
                                    <span class="text-gray-500">Size:</span> {{$item->variant->size}}
                                </p>
                                <div class="flex items-center justify-between mt-3">
                                    <div class="text-sm text-gray-400">
                                        <span>Qty:
                                            <span class="text-white font-medium">{{$item->quantity}}</span>
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-gray-400 text-sm">Rs. {{number_format($item->price * $item->quantity)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>

            <!-- Right Column: Sidebar -->
            <div class="lg:col-span-1 space-y-6">

                <!-- Price Summary -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                    <h2 class="text-lg font-semibold text-white mb-6">Price Summary</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Subtotal</span>
                            <span class="text-white font-medium">Rs. {{number_format($order->subtotal)}}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Shipping</span>
                            <span class="text-white font-medium">{{$order->shipping==0?'Free':number_format($order->shipping)}}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Discount</span>
                            <span class="text-green-400 font-medium">-Rs. {{number_format($order->discount)}}</span>
                        </div>
                        <div class="h-px bg-gray-800"></div>
                        <div class="flex justify-between items-center pt-2">
                            <span class="text-white font-semibold">Total</span>
                            <span class="text-orange-500 font-bold text-xl">Rs. {{number_format($order->total)}}</span>
                        </div>
                    </div>
                </div>

                <!-- Shipping Information -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                    <h2 class="text-lg font-semibold text-white mb-6">Shipping Information</h2>
                    <dl class="space-y-4">
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Customer Name</dt>
                            <dd class="text-white font-medium">{{Auth::user()->name}}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Phone Number</dt>
                            <dd class="text-white font-medium">{{$order->shipping_phone}}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Shipping Address</dt>
                            <dd class="text-white font-medium">
                                {{$order->shipping_address}}<br>
                                {{$order->shipping_city}}, {{$order->shipping_province}}
                            </dd>
                        </div>
                    </dl>
                </div>

                <!-- Payment Information -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                    <h2 class="text-lg font-semibold text-white mb-6">Payment Information</h2>
                    <dl class="space-y-4">
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Payment Method</dt>
                            <dd class="text-white font-medium">{{$order->payment->method==='cod'?'Cash on Delivery':'Online Payment'}}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Payment Status</dt>
                            <dd class="flex items-center gap-2">
                                <span class="inline-block w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="text-white font-medium">{{ucfirst($order->payment->status)}}</span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Transaction ID</dt>
                            <dd class="text-white font-medium text-sm">{{$order->payment->method==='cod'?'N/A':$order->payment->transaction_id}}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Payment Date</dt>
                            <dd class="text-white font-medium">{{$order->payment->paid_at==null?'Pending':$order->payment->paid_at->format('F j, Y')}}</dd>
                        </div>
                    </dl>
                </div>

                <!-- Order Information -->
                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                    <h2 class="text-lg font-semibold text-white mb-6">Order Information</h2>
                    <dl class="space-y-4">
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Order ID</dt>
                            <dd class="text-white font-medium">#{{$order->order_number}}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Order Date</dt>
                            <dd class="text-white font-medium">{{$order->created_at->format('F j, Y')}}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Items</dt>
                            <dd class="text-white font-medium">{{$order->items->count()}} Item(s)</dd>
                        </div>
                        <div>
                            <dt class="text-gray-400 text-sm font-medium mb-1">Order Status</dt>
                            <dd class="flex items-center gap-2">
                                <span class="inline-block w-2 h-2 rounded-full bg-orange-500"></span>
                                <span class="text-white font-medium">{{ucfirst($order->status)}}</span>
                            </dd>
                        </div>
                    </dl>
                </div>

            </div>
        </div>

        <!-- Support Section -->
        <div class="mt-12 bg-gradient-to-r from-gray-900 to-gray-800 border border-gray-800 rounded-xl p-8 text-center">
            <i class="fas fa-headset text-orange-500 text-4xl mb-4 inline-block"></i>
            <h2 class="text-2xl font-semibold text-white mt-4 mb-3">Need help with your order?</h2>
            <p class="text-gray-400 mb-6 max-w-2xl mx-auto">
                If you have any questions about your order, our support team is here to help. We're available 24/7 to assist you.
            </p>
            <button class="inline-block px-8 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-lg transition-colors duration-200">
                <i class="fas fa-envelope mr-2"></i>Contact Support
            </button>
        </div>

    </div>
</div>