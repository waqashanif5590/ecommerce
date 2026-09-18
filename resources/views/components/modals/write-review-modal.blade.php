@props(['name'=>'write-review', 'product'=>null])
<section
    x-data="{showReviewModal: false}"
    x-show="showReviewModal"
    x-transition.opacity role="dialog" aria-modal="true" aria-labelledby="review-form-heading"
    x-on:close-modal.window="if($event.detail.name==='{{$name}}')
    {showReviewModal=false}"
    x-on:open-modal.window="if($event.detail.name==='{{$name}}')
    {showReviewModal=true}"
    class="fixed inset-0 z-50 overflow-y-auto bg-gray-950/90 p-4 backdrop-blur-sm sm:p-8" style="display: none;">
    <div class="mx-auto flex min-h-full max-w-3xl items-center justify-center py-8">
        <div class="w-full rounded-2xl border border-gray-800 bg-gray-900 p-6 shadow-2xl sm:p-8">
            <div class="flex flex-col gap-2 border-b border-gray-800 pb-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Review details</p>
                    <h2 id="review-form-heading" class="mt-1 text-2xl font-bold text-white">Write a Review</h2>
                </div>
                <p class="text-sm text-gray-500">All fields marked <span class="text-orange-400">*</span> are required.</p>
            </div>
            <form wire:submit.prevent="submitReview({{ $product->id }})" class="mt-6 space-y-6">
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label for="review" class="text-sm font-semibold text-gray-200">Write a Review <span class="text-orange-400">*</span></label>
                        <textarea id="review" wire:model="review" placeholder="Share your experience with this product" class="mt-2 w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white placeholder:text-gray-600 outline-none transition-colors focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20"></textarea>
                        <x-input-error :messages="$errors->get('review')" class="mt-2" />
                    </div>

                    <div>
                        <label for="rating" class="text-sm font-semibold text-gray-200">Give a Rating <span class="text-orange-400">*</span></label>
                        <div class="mt-2 flex items-center gap-2" role="radiogroup" aria-label="Product rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <div>
                                    <input id="rating-{{ $i }}" type="radio" wire:model="rating" value="{{ $i }}" class="peer sr-only">
                                    <label for="rating-{{ $i }}" class="block cursor-pointer text-2xl text-gray-600 transition-colors hover:text-orange-400 peer-checked:text-orange-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-orange-400 focus-within:ring-offset-2 focus-within:ring-offset-gray-900" title="{{ $i }} star{{ $i === 1 ? '' : 's' }}">
                                        <i class="fa-solid fa-star" aria-hidden="true">⭐</i>
                                        <span class="sr-only">{{ $i }} star{{ $i === 1 ? '' : 's' }}</span>
                                    </label>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-gray-800 pt-6 sm:flex-row sm:justify-end">
                    <button type="button" @click="showReviewModal = false" class="inline-flex w-full items-center justify-center rounded-xl border border-gray-700 px-5 py-3 text-sm font-semibold text-gray-300 transition-colors hover:border-gray-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-900 sm:w-auto">Cancel</button>

                    <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-gray-900 sm:w-auto">
                        <i class="fa-solid fa-check" aria-hidden="true"></i>
                        Submit Review
                    </button>
                </div>
            </form>
    </div>
    </div>
</section>