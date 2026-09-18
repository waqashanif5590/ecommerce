  <article class="rounded-2xl border border-gray-800 bg-gray-950 p-4 sm:p-5">
      <div class="flex gap-4 sm:gap-5">
          <div class="h-28 w-24 shrink-0 overflow-hidden rounded-xl bg-gray-800 sm:h-36 sm:w-32"><img src="{{asset('images/'.$cartItem->productVariant->product->primaryImage->image)}}" alt="Velocity Runner Pro shoes" class="h-full w-full object-cover transition-transform duration-300 hover:scale-105"></div>
          <div class="min-w-0 flex-1">
              <div class="flex items-start justify-between gap-3">
                  <div>
                      <p class="text-sm text-gray-500">{{$cartItem->productVariant->product->category->title}}</p>
                      <h3 class="mt-1 text-lg font-semibold text-white">{{$cartItem->productVariant->product->name}}</h3>
                  </div>
                  <button type="button"
                      wire:click="confirmRemoveCartItem({{$cartItem->id}})"
                      aria-label="Remove {{$cartItem->productVariant->product->name}}" class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-gray-900 text-gray-500 transition-colors hover:bg-red-950 hover:text-red-400"><i class="fa-regular fa-trash-can"></i></button>
              </div>
              <p class="mt-2 text-sm text-gray-400">Size: <span class="text-gray-200">US {{$cartItem->productVariant->size}}</span></p>
              <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
                  <p class="font-bold text-white">PKR {{number_format($cartItem->productVariant->product->price)}}</p>
                  <p class=" text-gray-500 italic text-sm">Discount {{number_format($cartItem->productVariant->product->total_discount)}} %</p>
                  <div class="flex items-center rounded-lg border border-gray-700">
                      <button type="button" wire:click="setQuantity('min',{{$cartItem->id}})" wire:loading.attr="disabled" wire:target="setQuantity('min', {{$cartItem->id}})" aria-label="Decrease quantity" class="h-8 w-8 text-gray-400 transition-colors hover:bg-gray-800 hover:text-orange-400">&minus;</button><span class="w-8 text-center text-sm text-white">{{$cartItem->quantity}}</span><button type="button" wire:click="setQuantity('plus',{{$cartItem->id}})" wire:loading.attr="disabled" wire:class="cursor-not-allowed opacity-50"
                          wire:target="setQuantity('plus', {{$cartItem->id}})" aria-label="Increase quantity" class="h-8 w-8 text-gray-400 transition-colors hover:bg-gray-800 hover:text-orange-400">+</button>
                  </div>
                  <p class="font-semibold text-orange-400">Total: PKR {{number_format($cartItem->total_price)}}</p>
              </div>
          </div>
      </div>
  </article>