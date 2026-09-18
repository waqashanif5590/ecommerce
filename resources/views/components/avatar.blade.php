<div class="flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-orange-500 bg-gray-800">
    @if(Auth::user()->profile_image)
    <img src="{{ asset('storage/profile_images/' . Auth::user()->profile_image) }}" alt="{{ Auth::user()->name }} profile" class="h-full w-full object-cover">
    @else
    <img src="/images/profile.jpg" alt="{{ Auth::user()->name }} profile" class="h-full w-full object-cover">
    @endif
</div>