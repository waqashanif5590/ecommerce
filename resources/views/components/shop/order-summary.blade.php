  <aside class="rounded-2xl border border-gray-800 bg-gray-950 p-5 sm:p-7 lg:sticky lg:top-24">
      <h2 class="text-2xl font-bold text-white">Order Summary</h2>
      <dl class="mt-6 space-y-4 text-sm">
          <div class="flex justify-between">
              <dt class="text-gray-400">Subtotal</dt>
              <dd class="text-white">PKR {{number_format($subTotal)}}</dd>
          </div>
          <div class="flex justify-between">
              <dt class="text-gray-400">Shipping</dt>
              <dd class="font-medium text-green-400">{{$shipping==0?'Free':$shipping}}</dd>
          </div>
          <div class="flex justify-between">
              <dt class="text-gray-400">Discount</dt>
              <dd class="text-orange-400">- PKR {{number_format($discount)}}</dd>
          </div>
      </dl>
      <div class="my-6 border-t border-gray-800"></div>
      <div class="flex items-end justify-between"><span class="font-semibold text-white">Total</span><span class="text-3xl font-bold text-white">PKR {{number_format($totalBill)}}</span></div>
      <div class="mt-7"><label for="promo-code" class="text-sm font-medium text-gray-300">Have a promo code?</label>
          <div class="mt-2 flex gap-2"><input id="promo-code" type="text" placeholder="Enter promo code" class="min-w-0 flex-1 rounded-lg border border-gray-700 bg-gray-900 px-3 py-3 text-sm text-white outline-none placeholder:text-gray-600 focus:border-orange-500"><button type="button" class="rounded-lg border border-orange-500 px-4 text-sm font-semibold text-orange-400 transition-colors hover:bg-orange-500 hover:text-white">Apply</button></div>
      </div>
      <a href="{{route('checkout')}}" type="button" class="mt-7 w-full rounded-xl bg-orange-500 px-5 py-4 font-bold text-white shadow-lg shadow-orange-500/20 transition-all duration-200 hover:-translate-y-0.5 hover:bg-orange-400 hover:shadow-orange-500/30">Proceed to Checkout <i class="fa-solid fa-arrow-right-long ml-2"></i></a>
      <p class="mt-3 text-center text-xs text-gray-500">Taxes calculated at checkout</p>
      <div class="mt-7 space-y-3 border-t border-gray-800 pt-5 text-sm text-gray-400">
          <p><i class="fa-solid fa-check mr-2 text-orange-400"></i>Free shipping on orders over $75</p>
          <p><i class="fa-solid fa-lock mr-2 text-orange-400"></i>Secure checkout</p>
          <p><i class="fa-solid fa-rotate-left mr-2 text-orange-400"></i>Easy 60-day returns</p>
      </div>
  </aside>