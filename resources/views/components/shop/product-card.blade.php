<div class="card">
    <div
        class="image group relative h-60 rounded-2xl bg-cover bg-center bg-no-repeat p-5 transition-transform duration-300 hover:scale-105"
        style="background-image: url('{{ asset('images/' . ($product->primaryImage?->image ?? 'landing_back.jpg')) }}');">

        @if($product->total_discount!=NULL)
        <div class="w-fit rounded-[13px] bg-orange-500 px-2 py-0.5 text-sm font-bold text-white">
            {{$product->total_discount}}% OFF
        </div>
        @elseif($product->is_new)
        <div class="w-fit rounded-[13px] bg-green-500 px-2 py-0.5 text-sm font-bold text-white">
            New
        </div>
        @endif
        @if($product->badge!=NULL)
        <div class="mt-2 w-fit rounded-[13px] bg-yellow-500 px-2.5 py-0.5 text-sm font-bold text-white">
            {{$product->badge}}
        </div>
        @endif
        <div
            class="action-buttons invisible absolute inset-0 flex translate-y-4 items-end justify-center space-x-2 bg-gradient-to-tr from-black to-transparent px-2 py-4 opacity-0 transition-all duration-300 ease-out group-hover:visible group-hover:translate-y-0 group-hover:opacity-100">
            <a href="{{route('product.details', $product->slug)}}" aria-label="Add Velocity Runner Pro to cart"
                class="w-[75%] cursor-pointer rounded text-gray-900 bg-gray-300 px-4 py-2 transition-colors hover:bg-gray-200 text-center">
                View Details
            </a>
            <button type="button" wire:click="addToWishlist({{$product->id}})" class="w-[25%] cursor-pointer rounded bg-gray-300 px-4 py-2 transition-colors text-gray-900 hover:bg-gray-200">

                <i class="fa-{{ $product->isInWishlist ? 'solid' : 'regular' }} fa-heart"></i>
            </button>
        </div>
    </div>
    <div class="item-details mt-3 flex justify-between">
        <div class="details">
            <p class="text-gray-300">{{$product->category->title}}</p>
            <h1 class="text-white text-lg">{{$product->name}}</h1>
            <h1 class="text-white font-bold my-1">PKR {{number_format($product->discounted_price)}}</h1>
            <p class="text-gray-400 text-sm">{{$product->variants->count()}} Sizes available</p>
        </div>
        <div class="rating text-gray-400 text-sm">⭐ 4.9</div>
    </div>
</div>