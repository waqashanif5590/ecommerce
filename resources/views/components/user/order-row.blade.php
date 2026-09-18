 <div class="grid gap-4 p-6 sm:grid-cols-[1.2fr_1fr_0.8fr_0.8fr_auto] sm:items-center">
     <div>
         <p class="font-semibold text-white">#{{$order->order_number}}</p>
         <p class="mt-1 text-sm text-gray-500">{{$order->created_at->format('M d, Y')}}</p>
     </div>
     <p class="text-sm text-gray-400">
         <span class="text-gray-500 sm:hidden">Items: </span>
         {{$order->items()->count()}} items
     </p>
     <p class="font-semibold text-white">PKR {{number_format($order->total)}}</p>
     <span class="w-fit rounded-full bg-green-500/15 px-3 py-1 text-xs font-semibold text-green-400">
         {{ucfirst($order->status)}}
     </span>
     <a href="{{route('order.details', $order->id)}}" class="text-sm font-medium text-orange-400 hover:text-orange-300">Details <i class="fa-solid fa-chevron-right ml-1 text-xs"></i>
     </a>
 </div>