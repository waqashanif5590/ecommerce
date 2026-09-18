 <div class="header sticky top-0 z-20 flex items-center bg-black px-4 py-3 sm:px-6 lg:px-8">
     <!-- Hamburger -->
     <button type="button" class="hamburger z-30 flex shrink-0 cursor-pointer flex-col gap-1 md:hidden"
         aria-label="Toggle navigation menu" aria-expanded="false">
         <div class="lines h-0.5 w-5 bg-gray-400"></div>
         <div class="lines h-0.5 w-5 bg-gray-400"></div>
         <div class="lines h-0.5 w-5 bg-gray-400"></div>
     </button>


     <!-- Logo -->
     <x-application-logo />


     <!-- Navbar -->
     <div class="nav-bar absolute left-0 top-0 z-20 hidden h-screen w-full flex-col items-center justify-center bg-gray-900 text-white
               md:static md:flex md:h-auto md:min-w-0 md:flex-1 md:flex-row md:justify-center md:bg-transparent">
         <ul class="flex w-full flex-col items-center gap-1 border-b border-gray-700
                   md:w-auto md:flex-row md:gap-5 md:border-b-0
                   lg:gap-7">
             <li class="w-full md:w-auto">
                 <a href="/products" class="block {{request()->routeIs('products')?'active':''}} p-3 pl-10 text-left
                           md:px-2 md:py-2 md:text-center active:text-orange-400
                           lg:px-3">
                     Shop
                 </a>
             </li>

             <li class="w-full md:w-auto">
                 <a href="/categories" class="block p-3 pl-10 text-left
                           md:px-2 md:py-2 md:text-center
                           lg:px-3">
                     Categories
                 </a>
             </li>

             <li class="w-full md:w-auto">
                 <a href="#" class="block p-3 pl-10 text-left
                           md:px-2 md:py-2 md:text-center
                           lg:px-3">
                     New Arrivals
                 </a>
             </li>

             <li class="w-full md:w-auto">
                 <a href="#" class="block p-3 pl-10 text-left
                           md:px-2 md:py-2 md:text-center
                           lg:px-3">
                     Sales
                 </a>
             </li>

             <li class="w-full md:w-auto">
                 <a href="#" class="block p-3 pl-10 text-left
                           md:px-2 md:py-2 md:text-center
                           lg:px-3">
                     About
                 </a>
             </li>
             @auth
             <li class="w-full md:w-auto">
                 <a href="{{route('user.dashboard')}}" class="block p-3 pl-10 text-left
                           md:px-2 md:py-2 md:text-center
                           lg:px-3">
                     My Dashboard
                 </a>
             </li>
             @endauth
         </ul>
     </div>


     <!-- Utility Bar -->
     <div class="utility-bar ml-auto flex shrink-0 items-center justify-center gap-3 text-gray-200 md:gap-4">
         <a href="#" class="text-gray-400 transition-colors duration-200 hover:text-orange-400">
             <i class="fa-solid fa-magnifying-glass"></i>
         </a>

         <a href="#" class="text-gray-400 transition-colors duration-200 hover:text-orange-400">
             <i class="fa-solid fa-sun"></i>
         </a>

         <a href="/wishlist" class="text-gray-400 transition-colors duration-200 hover:text-orange-400">
             <i class="fa-solid fa-heart"></i>
         </a>

         <a href="/cart" class="text-gray-400 transition-colors duration-200 hover:text-orange-400">
             <i class="fa-solid fa-cart-shopping"></i>
         </a>
     </div>
     @auth
     <form method="POST" action="{{ route('logout') }}">
         @csrf

         <button
             type="submit"
             class="cursor-pointer rounded-lg border border-gray-700 px-4 py-2 ml-4 text-sm font-medium text-gray-300 transition-all duration-200 hover:border-red-500 hover:bg-red-500/10 hover:text-red-400">
             Log Out
         </button>
     </form>
     @endauth

     @guest
     <a
         href="{{ route('login') }}"
         class="rounded-lg border border-gray-700 px-4 py-2 ml-4 text-sm font-medium text-gray-300 transition-all duration-200 hover:border-orange-500 hover:bg-orange-500 hover:text-white">
         Login
     </a>
     <a
         href="{{ route('register') }}"
         class="rounded-lg bg-orange-500 px-4 py-2 ml-2 text-sm font-semibold text-white transition-all duration-200 hover:bg-orange-600 hover:shadow-lg hover:shadow-orange-500/20">
         Register
     </a>
     @endguest
 </div>