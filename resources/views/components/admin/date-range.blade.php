  <section aria-labelledby="report-period" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
      <div class="flex flex-col justify-between gap-5 xl:flex-row xl:items-end">
          <div>
              <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Report period</p>
              <h3 id="report-period" class="mt-1 text-xl font-bold text-white">Choose a date range</h3>
              <p class="mt-2 text-sm text-gray-500">Use a preset or choose the dates you want to review.</p>
          </div>
          <div class="flex flex-col gap-3 sm:flex-row sm:flex-wrap sm:items-end">
              <label class="block text-sm font-medium text-gray-400">
                  <span class="mb-2 block">Range</span>
                  <select wire:model.live="rangePreset" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-3 py-3 text-sm text-white outline-none transition-colors focus:border-orange-500 sm:w-44">
                      <option value="today">Today</option>
                      <option value="last_7_days">Last 7 days</option>
                      <option value="last_30_days">Last 30 days</option>
                      <option value="this_month">This month</option>
                      <option value="last_month">Last month</option>
                      <option value="this_year">This year</option>
                      <option value="custom">Custom range</option>
                  </select>
              </label>
              <label class="block text-sm font-medium text-gray-400">
                  <span class="mb-2 block">From</span>
                  <span class="relative block">
                      <i class="fa-solid fa-calendar-days pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-orange-400"></i>
                      <input type="date" wire:model="startDate" wire:change="$set('rangePreset', 'custom')" class="w-full rounded-xl border border-gray-700 bg-gray-950 py-3 pl-10 pr-3 text-sm text-white outline-none transition-colors focus:border-orange-500">
                  </span>
                  @error('startDate') <span class="mt-1 block text-xs text-rose-400">{{ $message }}</span> @enderror
              </label>
              <label class="block text-sm font-medium text-gray-400">
                  <span class="mb-2 block">To</span>
                  <span class="relative block">
                      <i class="fa-solid fa-calendar-days pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-orange-400"></i>
                      <input type="date" wire:model="endDate" wire:change="$set('rangePreset', 'custom')" class="w-full rounded-xl border border-gray-700 bg-gray-950 py-3 pl-10 pr-3 text-sm text-white outline-none transition-colors focus:border-orange-500">
                  </span>
                  @error('endDate') <span class="mt-1 block text-xs text-rose-400">{{ $message }}</span> @enderror
              </label>
              <button type="button" wire:click="applyDateRange" wire:loading.attr="disabled" class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400 disabled:cursor-wait disabled:opacity-60">
                  <i class="fa-solid fa-file-lines"></i>
                  Generate Report
              </button>
          </div>
      </div>
  </section>