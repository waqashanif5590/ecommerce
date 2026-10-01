   <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
       <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Customer insights</p>
       <h3 class="mt-1 text-xl font-bold text-white">Customer insights</h3>
       <div class="mt-6 grid grid-cols-2 gap-4">
           <div class="rounded-xl bg-gray-950 p-4">
               <p class="text-xs text-gray-500">Returning customers</p>
               <p class="mt-2 text-2xl font-black text-white">{{$returningCustomersRate}}%</p>
               <p class="mt-1 text-xs text-emerald-400">this period</p>
           </div>
           <div class="rounded-xl bg-gray-950 p-4">
               <p class="text-xs text-gray-500">New sign ups</p>
               <p class="mt-2 text-2xl font-black text-white">{{$newCustomers}}</p>
               <p class="mt-1 text-xs text-emerald-400">{{$customersGrowth}} this period</p>
           </div>
           <div class="rounded-xl bg-gray-950 p-4">
               <p class="text-xs text-gray-500">Repeat purchase rate</p>
               <p class="mt-2 text-2xl font-black text-white">{{$repeatPurchaseRate}}%</p>
               <p class="mt-1 text-xs text-sky-400">Healthy customer loyalty</p>
           </div>
           <div class="rounded-xl bg-gray-950 p-4">
               <p class="text-xs text-gray-500">Top location</p>
               <p class="mt-2 text-lg font-black text-white">{{$topCity->shipping_city}}</p>
               <p class="mt-1 text-xs text-gray-500">{{$topCity->percentage}}% of all orders</p>
           </div>
       </div>
   </article>