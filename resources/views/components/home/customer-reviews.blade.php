<div class="card rounded-xl bg-gray-900 p-6 sm:p-7">
    <div class="stars">
        @for($i=1; $i<=5; $i++)
            <span><i class="fa-solid fa-star {{$i<$review->rating?'text-yellow-400':'text-gray-600'}}"></i></span>
            @endfor
    </div>
    <h1 class="comment text-white text-lg pt-4">
        {{$review->comment}}
    </h1>
    <div class="profile mt-10 flex items-center justify-start gap-5">
        <div class="image w-16 h-16">
            <img src="{{$review->user->profile_image?asset('images/'.$review->user->profile_image):'/images/profile.jpg'}}" alt="" srcset="" class="w-full h-full rounded-full">
        </div>
        <div class="customer-info text-white">
            <h1 class="text-xl font-bold">{{$review->user->name}}</h1>
            <p class="text-gray-400">{{$review->user->activity_type}}</p>
        </div>
    </div>
</div>