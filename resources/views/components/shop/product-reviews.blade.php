 <div class="mt-8 grid gap-8 lg:grid-cols-[0.7fr_1.3fr]">
     <div class="rounded-2xl border border-gray-800 bg-gray-900 p-6">
         <div class="flex items-end gap-3"><span class="text-5xl font-bold text-white">{{number_format($product->average_rating,1)}}</span><span
                 class="pb-1 text-sm text-gray-500">out of 5</span></div>
         <div class="mt-3 text-orange-400">@for($i=1; $i<=($product->getAverageRatingAttribute()); $i++)★@endfor</div>
         <p class="mt-2 text-sm text-gray-500">Based on {{count($product->reviews)}} reviews</p>
         <div class="mt-6 space-y-2 text-xs">
             <div class="flex items-center gap-3"><span>5</span>
                 <div class="h-2 flex-1 rounded-full bg-gray-800">
                     <div class="h-full w-[88%] rounded-full bg-orange-500"></div>
                 </div><span class="text-gray-500">112</span>
             </div>
             <div class="flex items-center gap-3"><span>4</span>
                 <div class="h-2 flex-1 rounded-full bg-gray-800">
                     <div class="h-full w-[10%] rounded-full bg-orange-500"></div>
                 </div><span class="text-gray-500">12</span>
             </div>
             <div class="flex items-center gap-3"><span>3</span>
                 <div class="h-2 flex-1 rounded-full bg-gray-800">
                     <div class="h-full w-[3%] rounded-full bg-orange-500"></div>
                 </div><span class="text-gray-500">3</span>
             </div>
         </div>
     </div>
     <div class="divide-y divide-gray-800">
         @foreach($product->reviews as $review)
         <article class="pb-6 pt-4">
             <div class="flex items-center justify-between">
                 <div>
                     <h3 class="font-semibold text-white">{{$review->user->name}}</h3>
                     <p class="mt-1 text-xs text-gray-500">Verified purchase</p>
                 </div><span class="text-sm text-orange-400">
                     @for ($i=1; $i<=($review->rating); $i++)★@endfor
                 </span>
             </div>
             <p class="mt-4 text-sm leading-6 text-gray-400">{{$review->review}}</p>
         </article>
         @endforeach

         @if($product->reviews->isEmpty())
         <article class="pb-6 pt-4">
             <p class="mt-4 text-sm leading-6 text-gray-400">No review for this product. Be the first one to review.</p>
         </article>
         @endif
     </div>
 </div>