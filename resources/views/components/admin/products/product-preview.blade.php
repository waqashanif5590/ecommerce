@props(['product'])

<section aria-labelledby="summary-heading" class="overflow-hidden rounded-2xl border border-gray-800 bg-gray-900">
    <div class="border-b border-gray-800 p-5">
        <h3 id="summary-heading" class="font-bold text-white">Product preview</h3>
    </div>
    <div class="space-y-4 p-5">
        <img src="{{ $product->primaryImage?->image_url ?? asset('images/landing_back.jpg') }}" alt="{{ $product->name }}" class="aspect-[4/3] w-full rounded-xl object-cover">
        <div>
            <p class="text-sm font-semibold text-white">{{$product->name}}</p>
            <p class="mt-1 text-xs text-gray-500">{{$product->category->title}}</p>
        </div>
        <div class="flex items-center justify-between border-t border-gray-800 pt-4 text-sm">
            <span class="text-gray-500">Price</span>
            <span class="font-semibold text-white">PKR {{ number_format($product->price, 2) }}</span>
        </div>
        <div class="flex items-center justify-between text-sm">
            <span class="text-gray-500">Discount</span>
            <span class="font-semibold text-orange-300">{{$product->total_discount}}%</span>
        </div>
        <div class="flex items-center justify-between text-sm">
            <span class="text-gray-500">Variants</span>
            <span class="font-semibold text-white">{{ $product->variants->count() }} size / color combinations</span>
        </div>
    </div>
</section>
