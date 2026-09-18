<main x-data="{ showAddressModal: false, showDeleteConfirmation: false }" @keydown.escape.window="showAddressModal = false; showDeleteConfirmation = false" class="min-h-screen bg-gray-950 px-4 py-8 text-gray-300 sm:px-6 lg:px-8 lg:py-12">
    <div class="mx-auto max-w-7xl">
        <div class="grid gap-8 lg:grid-cols-[250px_minmax(0,1fr)] lg:items-start">
            <x-user.dashboard-sidebar />

            <div class="min-w-0 space-y-8">
        <!-- Page Header -->
        <header class="flex flex-col gap-6 border-b border-gray-800 pb-8 lg:flex-row lg:items-end lg:justify-between">
            <div class="space-y-4">
                <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-sm text-gray-500">
                    <a href="#" class="transition-colors hover:text-orange-400">Home</a>
                    <i class="fa-solid fa-chevron-right text-[10px] text-gray-700" aria-hidden="true"></i>
                    <a href="#" class="transition-colors hover:text-orange-400">Account</a>
                    <i class="fa-solid fa-chevron-right text-[10px] text-gray-700" aria-hidden="true"></i>
                    <span class="text-gray-300" aria-current="page">My Addresses</span>
                </nav>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Account settings</p>
                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">My Addresses</h1>
                    <p class="mt-2 max-w-xl text-sm leading-6 text-gray-400">Manage your saved addresses for faster checkout.</p>
                </div>
            </div>
            <button type="button" @click="showAddressModal = true" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-gray-950 sm:w-auto">
                <i class="fa-solid fa-plus" aria-hidden="true"></i>
                Add New Address
            </button>
        </header>

        <!-- Address List -->
        <section aria-labelledby="saved-addresses-heading" class="space-y-5">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Saved locations</p>
                    <h2 id="saved-addresses-heading" class="mt-1 text-2xl font-bold text-white">Your addresses</h2>
                </div>
                <p class="text-sm text-gray-500">{{$addresses->count()}} saved addresses</p>
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                @foreach($addresses as $address)
                <x-user.address-card :address="$address" />
                @endforeach
            </div>
        </section>

        <!-- Empty State: show when the address list is empty -->
        @if($addresses->isEmpty())
        <section aria-labelledby="empty-addresses-heading" class="rounded-2xl border border-dashed border-gray-700 bg-gray-900 px-6 py-16 text-center">
            <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-orange-500/10 text-2xl text-orange-400" aria-hidden="true">
                <i class="fa-solid fa-location-dot"></i>
            </span>
            <h2 id="empty-addresses-heading" class="mt-5 text-xl font-bold text-white">No addresses saved</h2>
            <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-gray-400">Add an address to make checkout faster and easier.</p>
            <button type="button" @click="showAddressModal = true" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-gray-900 sm:w-auto">
                <i class="fa-solid fa-plus" aria-hidden="true"></i>
                Add New Address
            </button>
        </section>
        @endif


        <!-- Add/Edit Address Form -->
        <x-modals.add-address-modal />

        <!-- Delete Confirmation: visual placeholder for a future modal state -->
        <x-modals.confirmation-modal
            name="delete-address"
            title="Delete this address?"
            message="Are you sure you want to delete this saved address? This action cannot be undone."
            confirm-text="Delete Address" />
            </div>
        </div>
    </div>
</main>