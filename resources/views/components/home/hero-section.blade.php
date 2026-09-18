<div
    class="hero-section relative mx-auto grid min-h-[90vh] max-w-7xl grid-cols-1 items-center gap-12 bg-gradient-to-tl from-black to-gray-900 px-4 py-14 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-20">
    <div
        class="hero-left flex flex-col items-center justify-start bg-gradient-to-tl from-black to-gray-900 lg:items-start">
        <span class="text-orange-400 bg-[rgb(152_61_12/27%)] px-3 py-1 rounded-xl"><i class="fa-solid fa-bolt"></i> New
            Collection 2026</span>
        <div class="slogan flex flex-col items-center justify-center">
            <span
                class="font-poppins mt-6 font-display text-5xl font-extrabold tracking-tight text-white sm:text-6xl lg:text-7xl">Step
                Into</span>
            <span class="font-poppins font-display text-5xl font-extrabold tracking-tight text-orange-400">Your
                Best</span>
        </div>
        <p class="my-5 max-w-xl text-center text-xl text-gray-400 lg:text-left">Premium footwear for every step of your
            journey. From
            athletic performance to everyday comfort.</p>
        <div
            class="btn-container flex w-full max-w-xl flex-col gap-5 border-b border-gray-500 pb-12 pt-1 lg:flex-row lg:pb-16">
            <a href="{{route('products')}}"
                class="block w-full rounded-full bg-orange-500 py-4 text-center text-white transition-all 0.3s ease-in shadow-lg shadow-orange-500/50 hover:shadow-orange-500/60">Shop
                Now &nbsp;<i class="fa-solid fa-arrow-right-long"></i></a>
            <a href="{{route('categories')}}"
                class="block w-full rounded-full border-2 border-gray-500 py-4 text-center text-white transition-all 0.3s ease-out hover:bg-orange-500">Browse
                Categories</a>
        </div>
        <div class="engagement mt-8 grid w-full max-w-xl grid-cols-3">
            <div class="followers flex flex-col items-center justify-center border-r border-gray-700 p-3 sm:p-5">
                <h1 class="text-white text-3xl font-bold text-center">50K+</h1>
                <span class="text-gray-500 text-center">Happy Customers</span>
            </div>
            <div class="rating flex flex-col items-center justify-center border-r border-gray-700 p-3 sm:p-5">
                <h1 class="text-white text-3xl font-bold text-center">4.9 ⭐</h1>
                <span class="text-gray-500 text-center">Average Rating</span>
            </div>
            <div class="styles flex flex-col items-center justify-center p-3 sm:p-5">
                <h1 class="text-white text-3xl font-bold text-center">300+</h1>
                <span class="text-gray-500 text-center">Styles Available</span>
            </div>
        </div>
    </div>
    <div
        class="hero-right flex relative min-h-[22rem] w-full overflow-hidden rounded-2xl sm:min-h-[30rem] lg:min-h-[36rem]">
        <div class="absolute inset-0 bg-cover bg-center image-float" style="background: url('/images/landing_back.jpg') no-repeat center/cover;">
        </div>
        <div class="relative z-10 py-6 px-1 flex justify-between items-center w-full">
            <div
                class="badge-1 flex justify-center items-center space-x-3 bg-white/10 backdrop-blur-md border border-white/20 shadow-lg rounded-xl px-4 py-2 max-w-sm text-white">

                <i class="fa-solid fa-check text-green-500 bg-[rgb(0_255_0/14%)] rounded-full p-3.5 text-xl"></i>
                <div class="badge-text">
                    <h1 class="text-sm font-semibold">Free Shipping</h1>
                    <p class="text-sm text-gray-400">Orders over $75</p>
                </div>
            </div>
            <div class="badge-2 flex flex-col space-y-20 items-end justify-between">
                <div class="discount-badge text-white">
                    <h1 class="bg-[#ffa500db] text-center w-22.5 p-3.5 rounded-full">UPTO <b>40%</b> OFF</h1>
                </div>
                <div
                    class="return-badge flex justify-center items-center space-x-3 bg-white/10 backdrop-blur-md border border-white/20 shadow-lg rounded-xl px-4 py-2 max-w-sm text-white">
                    <i class="fa-solid fa-rotate text-orange-400 bg-[rgb(255_165_0/8%)] rounded-full p-3.5 text-xl"></i>
                    <div class="badge-text">
                        <h1 class="text-sm font-semibold">Easy Returns</h1>
                        <p class="text-sm text-gray-400">60-Day Gaurantee</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>