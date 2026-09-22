<table class="w-full min-w-[650px] text-left text-sm">
    <thead class="text-xs uppercase tracking-wider text-gray-600">
        <tr>
            <th class="px-6 py-4 font-semibold">Order</th>
            @if(Auth::user()->role==='admin')
            <th class="px-6 py-4 font-semibold">Customer</th>
            @endif
            @if(Auth::user()->role==='user')
            <th class="px-6 py-4 font-semibold">Items</th>
            @endif
            <th class="px-6 py-4 font-semibold">Date</th>
            <th class="px-6 py-4 font-semibold">Amount</th>
            <th class="px-6 py-4 font-semibold">Status</th>
            <th class="px-6 py-4 font-semibold">Details</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-800">

        @foreach($orders as $order)
        <tr class="text-gray-300">
            <td class="px-6 py-4 font-semibold text-white">#{{$order->order_number}}</td>
            @if(Auth::user()->role==='admin')
            <td class="px-6 py-4">{{$order->user->name}}</td>
            @endif
            @if(Auth::user()->role==='user')
            <td class="px-6 py-4">{{$order->items()->count()}} items</td>
            @endif
            <td class="px-6 py-4 text-gray-500">{{$order->created_at->format('M d, Y')}}</td>
            <td class="px-6 py-4 font-semibold text-white">PKR {{number_format($order->total)}}</td>
            <td class="px-6 py-4"><span class="rounded-full bg-amber-500/10 px-3 py-1 text-xs font-semibold text-amber-300"> {{ucfirst($order->status)}}</span></td>
            <td class="px-6 py-4"> <a href="{{route('order.details', $order->id)}}" class="text-sm font-medium text-orange-400 hover:text-orange-300">
                    {{Auth::user()->role==='admin'?'Action':'Details'}}
                    <i class="fa-solid fa-chevron-right ml-1 text-xs"></i>
                </a></td>
        </tr>


        @endforeach
    </tbody>
</table>