<div>
   <!-- hero section -->
   <x-home.hero-section />
  
   <!-- Categories section -->
   <div class="categories mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">

      <h1 class="text-3xl text-white font-bold text-center">Shop by Category</h1>
      <p class="text-center text-gray-300 mt-1">Find the perfect pair for every occasion</p>
      <a href="/categories.html" class="block text-orange-600 text-center mt-2.5">View all <i
            class="fa-solid fa-chevron-right text-sm pl-1"></i></a>

      <div class="cards-container mt-12 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 lg:mt-16">
         @foreach($categories as $category)
         <x-shop.category-card :category="$category" />
         @endforeach
      </div>
   </div>

   <!-- All featured styles -->
   <div class="feature-collection border-b border-gray-800 bg-gray-900 px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
      <h1 class="text-3xl text-white font-bold text-center">Featured Collections</h1>
      <p class="text-center text-gray-300 mt-1">Our most popular styles handpicked for you</p>
      <a href="/products.html?collection=featured" class="block text-orange-600 text-center mt-2.5">View All Featured <i
            class="fa-solid fa-chevron-right text-sm pl-1"></i></a>

      <div class="cards-container mx-auto mt-12 grid max-w-7xl grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:mt-16">
         @foreach($products as $product)
         <x-shop.product-card :product="$product" />
         @endforeach
      </div>
   </div>

   <!-- Shiping info -->
   <div class="shiping-info border-b border-gray-800 bg-gray-900 px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
      <div class="info-cards mx-auto grid max-w-7xl grid-cols-1 gap-7 md:grid-cols-2 lg:grid-cols-4">
         <div class="card flex items-start gap-3">
            <i class="fa-solid fa-truck-fast shrink-0 rounded-lg bg-[rgb(159_75_14/29%)] p-4 text-lg text-orange-400"></i>
            <div class="ship-info-content">
               <h1 class="text-white text-lg font-bold">Free Shipping</h1>
               <p class="text-gray-400 text-sm">Free standard shipping on all orders over $75. Express options available.
               </p>
            </div>
         </div>
         <div class="card flex items-start gap-3">
            <i
               class="fa-solid fa-arrows-rotate shrink-0 rounded-lg bg-[rgb(159_75_14/29%)] p-4 text-lg text-orange-400"></i>
            <div class="ship-info-content">
               <h1 class="text-white text-lg font-bold">60-Day Return</h1>
               <p class="text-gray-400 text-sm">Changed your mind? Return unworn items within 60 days, no questions asked.
               </p>
            </div>
         </div>
         <div class="card flex items-start gap-3">
            <i
               class="fa-solid fa-scale-balanced shrink-0 rounded-lg bg-[rgb(159_75_14/29%)] p-4 text-lg text-orange-400"></i>
            <div class="ship-info-content">
               <h1 class="text-white text-lg font-bold">Size Guarantee</h1>
               <p class="text-gray-400 text-sm">Not the right fit? Exchange for a different size at no extra cost.</p>
            </div>
         </div>
         <div class="card flex items-start gap-3">
            <i
               class="fa-solid fa-heart-circle-check shrink-0 rounded-lg bg-[rgb(159_75_14/29%)] p-4 text-lg text-orange-400"></i>
            <div class="ship-info-content">
               <h1 class="text-white text-lg font-bold">Secure Checkout</h1>
               <p class="text-gray-400 text-sm">Your payment information is encrypted and secure. Shop with confidence.</p>
            </div>
         </div>
      </div>

   </div>

   <!-- New arrivals section -->
   <div class="new-arrivals mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
      <span class="flex w-fit items-center rounded-2xl background-blink px-3 py-1 text-sm font-bold text-green-500">
         <div class="mr-2 h-2 w-2 rounded-full animate-custom-color"></div> Just Droped
      </span>
      <h1 class="mt-4 text-center text-3xl font-bold text-white">New Arrivals</h1>
      <p class="mt-2 text-center text-gray-300">Fresh styles just landed - be the first to rock them</p>
      <a href="/products.html?sort=newest" class="mt-3 block text-center text-orange-600">Shop New Arrivals <i
            class="fa-solid fa-chevron-right text-sm pl-1"></i></a>

      <div class="cards-container mx-auto mt-12 grid max-w-7xl grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4 lg:mt-16">
         @foreach($new_products as $product)
         <x-shop.product-card :product="$product" />
         @endforeach
      </div>
   </div>

   <!-- Cutomers section -->
   <div
      class="customer-section mx-auto flex max-w-7xl flex-col items-center justify-center px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
      <span class="bg-[rgb(163_77_9/23%)] text-orange-400 px-2.5 py-1 rounded-xl">Customer Love</span>
      <h1 class="text-3xl text-white font-bold text-center mt-5">What Our Customers Say</h1>
      <p class="text-center text-gray-300 mt-4">Join thousands of happy customers who have made Stride their go-to
         footware brand.</p>
      <div class="customer-review-container mt-12 grid w-full grid-cols-1 gap-7 lg:mt-16 lg:grid-cols-3">
         @foreach($customer_reviews as $review)
         <x-home.customer-reviews :review="$review" />
         @endforeach
      </div>
   </div>

   <!-- engagement section 2 -->
   <div
      class="engagements-section mx-auto grid max-w-5xl grid-cols-2 gap-y-8 px-4 py-14 text-gray-500 sm:grid-cols-4 sm:gap-y-0 sm:px-6 lg:px-8 lg:py-20">
      <div class="customer-count">
         <h1 class="text-white text-3xl font-bold text-center">50K+</h1>
         <p class="text-gray-500 text-center">Happy Customers</p>
      </div>
      <div class="rating-count">
         <h1 class="text-white text-3xl font-bold text-center">4.9/5</h1>
         <p class="text-gray-500 text-center">Average Rating</p>
      </div>
      <div class="review-count">
         <h1 class="text-white text-3xl font-bold text-center">15K+</h1>
         <p class="text-gray-500 text-center">5-Star Reviews</p>
      </div>
      <div class="recomendation-count">
         <h1 class="text-white text-3xl font-bold text-center">98%</h1>
         <p class="text-gray-500 text-center">Would Recommendations</p>
      </div>
   </div>

   <!-- Subscription section -->
   <div class="subscription-section bg-gradient-to-t from-orange-500 to-orange-600 px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
      <h1 class="text-white text-4xl text-center font-bold">Ready to Step Up Your Game?</h1>
      <p class="mx-auto mt-4 max-w-3xl text-center text-lg text-gray-200">Join the Stride community and get 15% off your
         first order.
         Plus, early access to new releases and exclusive
         member-only deals.</p>
      <div class="form mx-auto mt-5 flex w-full max-w-2xl flex-col items-center justify-center gap-3">
         <input type="email" name="email" id="email" placeholder="Enter Your Email"
            class="w-full bg-[rgb(255_209_172/22%)] border-2 border-orange-300 rounded-4xl py-4 px-5 placeholder-orange-200">
         <button class="w-full bg-white border-2 border-transparent rounded-4xl py-4 px-5 font-bold text-orange-600">Get
            15% Off</button>
         <p class="text-orange-200">No Spam, Ever. Unsubcribe anytime.</p>
      </div>

      <p class="text-white font-bold text-center mt-5">Download our App</p>
      <div class="apps-list mt-5 flex flex-wrap items-center justify-center gap-4">
         <div class="app flex items-center justify-center gap-3 rounded-xl bg-black/40 px-4 py-3 text-white">
            <div class="icon"><i class="fa-brands fa-apple text-3xl"></i></div>
            <div class="info">
               <p class="text-[12px]">Download on the</p>
               <h1 class="text-sm font-bold">App Store</h1>
            </div>
         </div>
         <div class="app flex items-center justify-center gap-3 rounded-xl bg-black/40 px-4 py-3 text-white">
            <div class="icon"><i class="fa-brands fa-google-play text-3xl"></i></div>
            <div class="info">
               <p class="text-[12px]">Get it on</p>
               <h1 class="text-sm font-bold">Google Play</h1>
            </div>
         </div>

      </div>
   </div>

   <!-- contact section -->
   <x-home.contact-form />

</div>