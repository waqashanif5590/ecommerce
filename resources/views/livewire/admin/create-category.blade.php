<main class="min-h-screen bg-gray-950 px-4 py-8 text-gray-300 sm:px-6 lg:px-8 lg:py-12">
    <div class="mx-auto max-w-3xl">
        <header class="mb-8 flex flex-col justify-between gap-5 border-b border-gray-800 pb-7 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-orange-400">Admin panel</p>
                <h1 class="mt-2 text-3xl font-black tracking-tight text-white sm:text-4xl">Add a category</h1>
                <p class="mt-2 max-w-2xl text-sm leading-6 text-gray-400">Create a category to organize products and help shoppers browse the collection. Its URL is generated from the title.</p>
            </div>
            <a href="{{ route('categories') }}" class="inline-flex w-fit items-center gap-2 rounded-xl border border-gray-700 px-4 py-2.5 text-sm font-semibold text-gray-300 hover:bg-gray-900 hover:text-white">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to categories
            </a>
        </header>

        <form wire:submit="save" class="space-y-6">
            <section class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6" aria-labelledby="category-details-heading">
                <h2 id="category-details-heading" class="border-b border-gray-800 pb-5 text-lg font-bold text-white">Category details</h2>
                <div class="space-y-5 pt-5">
                    <div>
                        <label for="category-title" class="mb-2 block text-sm font-medium text-gray-300">Title</label>
                        <input id="category-title" wire:model="title" type="text" maxlength="255" required class="w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20">
                        @error('title') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="category-description" class="mb-2 block text-sm font-medium text-gray-300">Description</label>
                        <textarea id="category-description" wire:model="description" rows="4" required class="w-full resize-y rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm leading-6 text-white outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20"></textarea>
                        @error('description') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    </div>
                </div>
            </section>

            <section class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6" aria-labelledby="category-image-heading">
                <h2 id="category-image-heading" class="text-lg font-bold text-white">Category image</h2>
                <p class="mt-1 text-sm text-gray-500">Choose a JPG, PNG, or WebP image up to 5 MB.</p>
                <div class="pt-5">
                    <label for="category-image" class="mb-2 block text-sm font-medium text-gray-300">Image</label>
                    <input id="category-image" wire:model="image" type="file" accept="image/jpeg,image/png,image/webp" required class="block w-full text-sm text-gray-400 file:mr-4 file:rounded-lg file:border-0 file:bg-orange-500/10 file:px-4 file:py-2 file:font-semibold file:text-orange-300">
                    @error('image') <p role="alert" class="mt-2 text-sm text-rose-400">{{ $message }}</p> @enderror
                    <div wire:loading wire:target="image" class="mt-2 text-sm text-gray-400">Uploading image…</div>
                    @if($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview of the selected category" class="mt-4 h-48 w-full rounded-xl border border-gray-700 object-cover sm:max-w-md">
                    @endif
                </div>
            </section>

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('categories') }}" class="inline-flex items-center justify-center rounded-xl border border-gray-700 px-5 py-3 text-sm font-semibold text-gray-300 hover:bg-gray-900 hover:text-white">Cancel</a>
                <button type="submit" wire:loading.attr="disabled" wire:target="save" class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-semibold text-white hover:bg-orange-400 disabled:cursor-not-allowed disabled:opacity-60">
                    <i class="fa-solid fa-plus" aria-hidden="true"></i>
                    <span wire:loading.remove wire:target="save">Create category</span>
                    <span wire:loading wire:target="save">Creating…</span>
                </button>
            </div>
        </form>
    </div>
</main>
