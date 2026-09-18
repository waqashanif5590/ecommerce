@props(['name'=>'save-address'])
<section
    x-data="{showAddressModal = false}"
    x-show="showAddressModal"
    x-transition.opacity role="dialog" aria-modal="true" aria-labelledby="address-form-heading"
    x-on:close-modal.window="if($event.detail.name==='{{$name}}')
    {showAddressModal=false}"
    x-on:open-modal.window="if($event.detail.name==='{{$name}}')
    {showAddressModal=true}"
    class="fixed inset-0 z-50 overflow-y-auto bg-gray-950/90 p-4 backdrop-blur-sm sm:p-8" style="display: none;">
    <div class="mx-auto flex min-h-full max-w-3xl items-center justify-center py-8">
        <div class="w-full rounded-2xl border border-gray-800 bg-gray-900 p-6 shadow-2xl sm:p-8">
            <div class="flex flex-col gap-2 border-b border-gray-800 pb-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Address details</p>
                    <h2 id="address-form-heading" class="mt-1 text-2xl font-bold text-white">{{ $this->addressToEdit ? 'Edit Address' : 'Add a new address' }}</h2>
                </div>
                <p class="text-sm text-gray-500">All fields marked <span class="text-orange-400">*</span> are required.</p>
            </div>
            <form wire:submit="saveAddress" class="mt-6 space-y-6">
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label for="full-name" class="text-sm font-semibold text-gray-200">Full Name <span class="text-orange-400">*</span></label>
                        <input id="full-name" type="text" wire:model="name" placeholder="Muhammad Ahmad" class="mt-2 w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white placeholder:text-gray-600 outline-none transition-colors focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <label for="phone-number" class="text-sm font-semibold text-gray-200">Phone Number <span class="text-orange-400">*</span></label>
                        <input id="phone-number" type="tel" wire:model="phone" placeholder="+92 300 1234567" class="mt-2 w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white placeholder:text-gray-600 outline-none transition-colors focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20">
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <div>
                        <label for="address-type" class="text-sm font-semibold text-gray-200">Address Type <span class="text-orange-400">*</span></label>
                        <select id="address-type" name="type" wire:model="type" class="mt-2 w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white outline-none transition-colors focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20">
                            <option value="home">Home</option>
                            <option value="office">Office</option>
                            <option value="other">Other</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>
                    <div>
                        <label for="country" class="text-sm font-semibold text-gray-200">Country <span class="text-orange-400">*</span></label>
                        <input id="country" type="text" wire:model="country" placeholder="Pakistan" class="mt-2 w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white placeholder:text-gray-600 outline-none transition-colors focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20">
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                    </div>
                    <div class="md:col-span-2">
                        <label for="address-line-1" class="text-sm font-semibold text-gray-200">Address Line <span class="text-orange-400">*</span></label>
                        <input id="address-line-1" type="text" wire:model="address_line" placeholder="House 123, Street 5" class="mt-2 w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white placeholder:text-gray-600 outline-none transition-colors focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20">
                        <x-input-error :messages="$errors->get('address_line')" class="mt-2" />
                    </div>
                    <div>
                        <label for="city" class="text-sm font-semibold text-gray-200">City <span class="text-orange-400">*</span></label>
                        <input id="city" type="text" wire:model="city" placeholder="Jhang" class="mt-2 w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white placeholder:text-gray-600 outline-none transition-colors focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20">
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>
                    <div>
                        <label for="state" class="text-sm font-semibold text-gray-200">State / Province <span class="text-orange-400">*</span></label>
                        <input id="state" type="text" wire:model="state" placeholder="Punjab" class="mt-2 w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white placeholder:text-gray-600 outline-none transition-colors focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20">
                        <x-input-error :messages="$errors->get('state')" class="mt-2" />
                    </div>
                    <div>
                        <label for="postal-code" class="text-sm font-semibold text-gray-200">Postal Code <span class="text-orange-400">*</span></label>
                        <input id="postal-code" type="text" wire:model="postal_code" placeholder="35200" class="mt-2 w-full rounded-xl border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white placeholder:text-gray-600 outline-none transition-colors focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20">
                        <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                    </div>
                </div>
                <label class="flex cursor-pointer items-center gap-3 text-sm text-gray-300">
                    <input type="checkbox" wire:model="is_default" class="h-4 w-4 rounded border-gray-600 bg-gray-950 text-orange-500 accent-orange-500 focus:ring-2 focus:ring-orange-400/40">
                    <span>Set as default address</span>
                </label>
                <div class="flex flex-col-reverse gap-3 border-t border-gray-800 pt-6 sm:flex-row sm:justify-end">
                    <button type="button" @click="showAddressModal = false" class="inline-flex w-full items-center justify-center rounded-xl border border-gray-700 px-5 py-3 text-sm font-semibold text-gray-300 transition-colors hover:border-gray-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-900 sm:w-auto">Cancel</button>
                    <button type="submit" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-gray-900 sm:w-auto">
                        <i class="fa-solid fa-check" aria-hidden="true"></i>
                        {{$this->addressToEdit ? 'Update Address' : 'Save Address'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>