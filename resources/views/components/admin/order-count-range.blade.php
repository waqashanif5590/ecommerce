  @php

  $progressColors = ['orange-500', 'emerald-500', 'sky-500', 'violet-500'];

  $orders = collect([
  [
  'title'=>'Completed',
  'order_count'=>$orderCompleted,
  ],
  [
  'title'=>'Pending',
  'order_count'=>$orderPending,
  ],
  [
  'title'=>'Cancelled',
  'order_count'=>$orderCancelled,
  ]
  ]);
  $maxCount = $orders->max('order_count');
  $totalCount = $orders->sum('order_count');

  @endphp
  <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
      <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Order health</p>
      <h3 class="mt-1 text-xl font-bold text-white">Order status summary</h3>

      <div class="mt-6 space-y-4">
          @foreach($orders as $order)
          @php
          $percentage = $totalCount>0?($order['order_count']/$totalCount)*100:0;
          $progressColor = $progressColors[$loop->index % count($progressColors)];
          @endphp
          <div class="flex items-center justify-between text-sm">
              <span class="flex items-center gap-2 text-gray-400">
                  <i class="fa-solid fa-circle text-{{$progressColor}}"></i>{{$order['title']}}</span>
              <strong class="text-white">{{$order['order_count']}}</strong>
          </div>
          <div class="h-2 rounded-full bg-gray-800">
              <div class="h-2 rounded-full bg-{{$progressColor}}" style="width: {{$percentage}}%"></div>
          </div>
          @endforeach
         
      </div>
  </article>