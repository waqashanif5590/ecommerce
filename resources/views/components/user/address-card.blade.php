<!-- Address Card -->
<article class="flex h-full flex-col rounded-2xl border {{$address->is_default ? 'border-orange-500/60' : 'border-gray-800'}} bg-gray-900 p-6 shadow-lg shadow-orange-950/10 transition-colors hover:border-orange-400">
    <div class="flex items-start justify-between gap-4">
        <div class="flex items-center gap-3">
            <span class="flex h-11 w-11 items-center justify-center rounded-xl {{$address->type==='home' ? 'bg-orange-500/15' : ($address->type==='office' ? 'bg-blue-500/15' : 'bg-gray-800')}} text-orange-400" aria-hidden="true">
                <i class="fa-solid fa-{{ $address->type === 'home' ? 'house' : ($address->type === 'office' ? 'building' : 'map-marker-alt') }} text-lg"></i>
            </span>
            <div>
                <h3 class="font-bold text-white">{{ ucfirst($address->type) }}</h3>
                <p class="mt-0.5 text-xs text-gray-500">{{$address->getAddressTypeDescriptionAttribute()}}</p>
            </div>
        </div>
        <!-- Default Address Indicator / Other Address Indicator -->
        <span class="inline-flex items-center gap-1.5 rounded-full border {{$address->is_default ? 'border-orange-500/30' : 'border-gray-800'}} bg-orange-500/10 px-2.5 py-1 text-xs font-semibold text-orange-300">
            @if($address->is_default)
            <i class="fa-solid fa-check text-[10px]" aria-hidden="true"></i>
            Default
            @else
            Other
            @endif
        </span>
    </div>
    <div class="mt-6 space-y-1.5 text-sm leading-6 text-gray-400">
        <p class="font-semibold text-gray-100">{{ $address->name }}</p>
        <p class="flex items-center gap-2"><i class="fa-solid fa-phone w-4 text-xs text-gray-600" aria-hidden="true"></i>{{ $address->phone }}</p>
        <div class="border-t border-gray-800 pt-3">
            <p>{{ $address->address_line }}</p>
            <p>{{ $address->city }}, {{ $address->state }} {{ $address->postal_code }}</p>
            <p>{{ $address->country }}</p>
        </div>
    </div>
    <div class="flex justify-between items-center mt-auto pt-5 border-t border-gray-800">
        <div class="flex gap-4">
            <button type="button" wire:click="editAddress({{$address->id}})" class="inline-flex items-center gap-2 text-sm font-semibold text-orange-400 transition-colors hover:text-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-gray-900" aria-label="Edit Home address">
                <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
                Edit
            </button>
            <button type="button" wire:click="confirmDelete({{$address->id}})" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 transition-colors hover:text-red-400 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 focus:ring-offset-gray-900" aria-label="Delete Home address">
                <i class="fa-regular fa-trash-can" aria-hidden="true"></i>
                Delete
            </button>
        </div>
        @if($address->is_default==false)
        <button wire:click="makeDefaultAddress({{$address->id}})" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-orange-500 py-2 px-3 text-sm font-semibold text-white transition-colors hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-gray-900 sm:w-auto">Make Default</button>
        @endif
    </div>
</article>