   <aside class="hidden lg:block">
       <div class="sticky top-8 space-y-8">
           <div>
               <p class="text-xs font-semibold uppercase tracking-[0.3em] text-orange-400">Admin panel</p>
               <h1 class="mt-2 text-2xl font-black tracking-tight text-white">Control center</h1>
           </div>
           <nav aria-label="Admin navigation" class="space-y-2">
               <a href="#overview" class="flex items-center gap-3 rounded-xl bg-orange-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-orange-500/10"><i class="fa-solid fa-chart-line w-4 text-center"></i>Overview</a>
               <a href="{{route('all.orders')}}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-receipt w-4 text-center"></i>Orders <span class="ml-auto rounded-full bg-orange-500/15 px-2 py-0.5 text-xs text-orange-300">{{$total_orders}}</span></a>
               <a href="#products" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-box-open w-4 text-center"></i>Products</a>
               <a href="#customers" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-users w-4 text-center"></i>Customers</a>
               <a href="#settings" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-gray-400 transition-colors hover:bg-gray-900 hover:text-white"><i class="fa-solid fa-gear w-4 text-center"></i>Settings</a>
           </nav>
           <div class="rounded-2xl border border-gray-800 bg-gray-900 p-4">
               <div class="flex items-center gap-3">
                   <div class="flex h-10 w-10 items-center justify-center rounded-full bg-orange-500 font-bold text-white">AD</div>
                   <div class="min-w-0">
                       <p class="truncate text-sm font-semibold text-white">Admin account</p>
                       <p class="truncate text-xs text-gray-500">Store manager</p>
                   </div>
               </div>
           </div>
       </div>
   </aside>