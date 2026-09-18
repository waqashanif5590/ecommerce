<div
    x-data="{
        show: false,
        message: '',
        type: 'success',
        timeout: null,

        displayAlert(event) {
            clearTimeout(this.timeout);

            this.message = event.detail.message;
            this.type = event.detail.type ?? 'success';
            this.show = true;

            this.timeout = setTimeout(() => {
                this.show = false;
            }, 3000);
        }
    }"

    x-init="@if(session('alert'))
    displayAlert(
    @js(session('alert.message')),
    @js(session('alert.type'))
    );
    @endif"
    x-on:alert.window="displayAlert($event)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-[-10px]"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed right-5 top-5 z-[9999] w-[calc(100%-2.5rem)] max-w-sm"
    style="display: none;">
    <div
        class="flex items-center gap-3 rounded-xl border border-gray-700 bg-gray-900 px-4 py-3 shadow-2xl"
        :class="{
            'border-green-500/30': type === 'success',
            'border-red-500/30': type === 'error',
            'border-yellow-500/30': type === 'warning',
            'border-blue-500/30': type === 'info'
        }">

        {{-- Icon --}}
        <div
            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full"
            :class="{
                'bg-green-500/10 text-green-400': type === 'success',
                'bg-red-500/10 text-red-400': type === 'error',
                'bg-yellow-500/10 text-yellow-400': type === 'warning',
                'bg-blue-500/10 text-blue-400': type === 'info'
            }">
            <i
                class="fa-solid"
                :class="{
                    'fa-check': type === 'success',
                    'fa-xmark': type === 'error',
                    'fa-triangle-exclamation': type === 'warning',
                    'fa-info': type === 'info'
                }"></i>
        </div>

        {{-- Message --}}
        <p
            class="flex-1 text-sm font-medium text-gray-200"
            x-text="message"></p>

        {{-- Close button --}}
        <button
            type="button"
            @click="show = false"
            class="text-gray-500 transition-colors hover:text-white">
            <i class="fa-solid fa-xmark"></i>
        </button>

    </div>
</div>