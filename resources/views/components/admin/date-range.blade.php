  <form action="#overview" method="get" class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
      <div class="flex flex-col justify-between gap-5 xl:flex-row xl:items-end">
          <div>
              <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Report period</p>
              <h3 class="mt-1 text-xl font-bold text-white">Choose a date range</h3>
              <p class="mt-2 text-sm text-gray-500">Select the dates you want to use for your store report.</p>
          </div>
          <div class="flex flex-col gap-3 sm:flex-row sm:items-end">
              <label class="block text-sm font-medium text-gray-400">
                  <span class="mb-2 block">Start date</span>
                  <span class="relative block">
                      <i class="fa-solid fa-calendar-days pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-orange-400"></i>
                      <input type="date" name="start_date" value="2026-06-10" class="rounded-xl border border-gray-700 bg-gray-950 py-3 pl-10 pr-3 text-sm text-white outline-none transition-colors focus:border-orange-500">
                  </span>
              </label>
              <label class="block text-sm font-medium text-gray-400">
                  <span class="mb-2 block">End date</span>
                  <span class="relative block">
                      <i class="fa-solid fa-calendar-days pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-orange-400"></i>
                      <input type="date" name="end_date" value="2026-08-10" class="rounded-xl border border-gray-700 bg-gray-950 py-3 pl-10 pr-3 text-sm text-white outline-none transition-colors focus:border-orange-500">
                  </span>
              </label>
              <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-orange-400"><i class="fa-solid fa-download"></i>Generate report</button>
          </div>
      </div>
  </form>