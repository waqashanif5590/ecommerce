<!-- Mulitple cards -->
<div
    class="card flex min-h-[22rem] items-end rounded-2xl bg-cover bg-center bg-no-repeat p-5"
    style="background-image: url('{{ asset('images/' . $category->image) }}');">
    <div class="card-content">
        <span class="bg-gray-300 text-sm rounded-xl px-3 py-1">{{$category->products->count()}} Products</span>
        <h1 class="text-xl font-bold text-white mt-3">{{$category->title}}</h1>
        <p class="text-gray-300 mb-3">{{$category->description}}</p>
        <a href="{{ route('products.category', $category->slug)}}"
            class="text-white p-2 border-2 border-transparent hover:border-white hover:text-lg rounded-xl transition-all duration-300 ease">Shop
            Now &nbsp;<i class="fa-solid fa-arrow-right-long"></i> </a>
    </div>
</div>