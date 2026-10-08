@props([
    'name',
    'slug' => null,
    'categoryId',
    'categories',
    'description',
    'categoryModel' => 'category_id',
    'showSlug' => true,
    'includeEmptyCategory' => false,
    'descriptionRequired' => false,
])

<section aria-labelledby="product-information-heading" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
    <div class="border-b border-gray-800 pb-5">
        <h3 id="product-information-heading" class="text-lg font-bold text-white">Product details</h3>
        <p class="mt-1 text-sm text-gray-500">The information shown on the product page.</p>
    </div>
    <div class="space-y-5 pt-5">
        <div>
            <label for="product-name" class="mb-2 block text-sm font-medium text-gray-300">Name</label>
            <input id="product-name" wire:model="name" type="text" value="{{ $name }}" required class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
            @error('name')
                <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>
        @if($showSlug)
            <div>
                <label for="product-slug" class="mb-2 block text-sm font-medium text-gray-300">Slug</label>
                <input id="product-slug" wire:model="slug" type="text" value="{{ $slug }}" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
            </div>
        @endif
        <div>
            <label for="product-category" class="mb-2 block text-sm font-medium text-gray-300">Category</label>
            <select id="product-category" wire:model="{{ $categoryModel }}" required class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                @if($includeEmptyCategory)
                    <option value="">Choose a category</option>
                @endif
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $categoryId ? 'selected' : '' }}>
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
            @error($categoryModel)
                <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="product-description" class="mb-2 block text-sm font-medium text-gray-300">Description</label>
            <textarea id="product-description" wire:model="description" rows="5" @if($descriptionRequired) required @endif class="w-full resize-y rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm leading-6 text-white outline-none transition focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">{{ $description }}</textarea>
            @error('description')
                <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>
    </div>
</section>
