      @php
      $progressColors = [ 'bg-violet-500','bg-orange-500', 'bg-emerald-500', 'bg-sky-500'];
      @endphp
      <article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
          <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Category breakdown</p>
          <h3 class="mt-1 text-xl font-bold text-white">Category performance</h3>
          <div class="mt-6 space-y-5">
              @foreach($categoryPerformace as $category)

              @php
              $progressColor = $progressColors[$loop->index % count($progressColors)];
              @endphp
              <div>
                  <div class="flex justify-between text-sm"><span class="text-gray-400">{{$category->title}}</span><span class="font-semibold text-white">{{$category->percentage}}%</span></div>
                  <div class="mt-2 h-2 rounded-full bg-gray-800">
                      <div class="h-2 rounded-full {{ $progressColor }}" style="width: {{$category->percentage}}%;"></div>
                  </div>
              </div>
              @endforeach
           
          </div>
      </article>