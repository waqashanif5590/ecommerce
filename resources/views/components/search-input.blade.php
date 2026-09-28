  <div wire:submit.prevent
      class="mt-8 flex flex-col gap-3 sm:flex-row">
      <label class="relative block flex-1">
          <span class="sr-only">{{$title}}</span><i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
          <input type="search" wire:model.live.600ms="search" name="search" placeholder="{{$description}}" class="w-full rounded-xl border border-gray-700 bg-gray-950 px-11 py-3.5 text-white outline-none transition-colors placeholder:text-gray-600 focus:border-orange-500">
      </label>
      <button type="submit" class="rounded-xl bg-orange-500 px-7 py-3 font-bold text-white transition-colors hover:bg-orange-400">Search</button>
  </div>