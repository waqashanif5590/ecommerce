<section class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
    <div class="flex items-center justify-between border-b border-gray-800 pb-5">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Saved destination</p>
            <h3 class="mt-1 text-xl font-bold text-white">Default Shipping Address</h3>
        </div>
        <i class="fa-solid fa-location-dot text-sky-400"></i>
    </div>
    <div class="pt-6">
        @if($address)
        <div class="mt-6 space-y-1 text-sm leading-6 text-gray-400">
            <p class="font-semibold text-gray-200">{{$address->name}}</p>
            <p>{{$address->address_line}}</p>
            <p>{{$address->city}}, {{$address->state}} {{$address->zip_code}}</p>
            <p>{{$address->phone}}</p>
        </div>
        <div class="mt-6 flex items-center gap-2 border-t border-gray-800 pt-5 text-xs text-gray-500"><i class="fa-solid fa-circle-check text-emerald-400"></i>Used for 8 of the last 12 orders</div>
        @else
        <p class="font-semibold text-gray-200">No default address set</p>
        @endif

        @if(Auth::user()->role==='user')
        <div class="mt-5 flex flex-wrap gap-4"><a href="{{route('user.address')}}" class="text-sm font-medium text-orange-400 hover:text-orange-300">Manage Addresses</a></div>
        @endif
    </div>
</section>