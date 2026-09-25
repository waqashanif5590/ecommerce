<section id="settings" class="rounded-2xl border border-rose-500/20 bg-rose-500/5 p-5 sm:p-6">
    <div class="flex items-center gap-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-rose-500/15 text-rose-300"><i class="fa-solid fa-shield-halved"></i></div>
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-rose-300">Account controls</p>
            <h3 class="mt-1 text-xl font-bold text-white">Manage access</h3>
        </div>
    </div>
    <p class="mt-5 text-sm leading-6 text-gray-400">Blocking prevents Hassan from signing in while preserving their order history. Deleting the account is permanent and cannot be undone.</p>
    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
        <button type="button" wire:click="confirmBlockUser" class="inline-flex items-center justify-center gap-2 rounded-xl border border-amber-500/40 px-4 py-2.5 text-sm font-semibold text-amber-300 transition-colors hover:bg-amber-500/10"><i class="fa-solid fa-ban"></i>Block user</button>
        <button type="button" wire:click="confirmDeleteUser" class="inline-flex items-center justify-center gap-2 rounded-xl border border-rose-500/40 px-4 py-2.5 text-sm font-semibold text-rose-300 transition-colors hover:bg-rose-500/10"><i class="fa-solid fa-trash"></i>Delete user</button>
    </div>
</section>