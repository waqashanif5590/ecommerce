  @php
  $colors = collect([
  [
  'bg' => 'bg-orange-500/15',
  'text' => 'text-orange-300',
  ],
  [
  'bg' => 'bg-sky-500/15',
  'text' => 'text-sky-300',
  ],
  [
  'bg' => 'bg-violet-500/15',
  'text' => 'text-violet-300',
  ],
  [
  'bg' => 'bg-emerald-500/15',
  'text' => 'text-emerald-300',
  ],
  [
  'bg' => 'bg-rose-500/15',
  'text' => 'text-rose-300',
  ],
  ]);
  @endphp
  <article id="customers" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
      <div class="flex items-center justify-between">
          <div>
              <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Customer directory</p>
              <h3 class="mt-1 text-xl font-bold text-white">Recent customers</h3>
          </div><a href="{{route('all.users')}}" class="inline-flex items-center gap-2 text-sm font-semibold text-orange-400 hover:text-orange-300">View all customers <i class="fa-solid fa-arrow-right"></i></a>
      </div>
      <div class="mt-5 divide-y divide-gray-800">
          @foreach($customers as $index => $customer)
          @php
          $color = $colors[$index % count($colors)];
          @endphp
          <div class="flex items-center gap-3 py-3 first:pt-0">
              <div class="flex h-9 w-9 items-center justify-center rounded-full {{$color['bg']}} text-xs font-bold {{$color['text']}}">{{$customer->getUserNameFirstLetters()}}</div>
              <div class="min-w-0 flex-1">
                  <p class="truncate text-sm font-semibold text-white">{{$customer->name}}</p>
                  <p class="text-xs text-gray-500">{{$customer->email}}</p>
              </div>
              <span class="text-xs text-gray-500">{{$customer->total_orders}} orders</span>
              <span class="text-xs text-gray-500"><a href="{{route('user.profile', $customer->id)}}" class="inline-flex items-center gap-2 text-sm font-semibold text-orange-400 hover:text-orange-300">Action</a></span>
          </div>
          @endforeach
      </div>
  </article>