 @props([
 'name'=>'confirmation-modal',
 'title'=>'Are you sure?',
 'message'=>'Are you sure you want to perform this action? This action cannot be undone.',
 'confirmText'=>'Confirm',
 ])
 <section
     x-data="{
    showDeleteConfirmation: false,
    recordId: null
     }"
     aria-labelledby="{{$name}}-heading"
     x-show="showDeleteConfirmation" x-transition.opacity role="dialog" aria-modal="true"
     x-on:close-confirmation-modal.window="if($event.detail.name==='{{$name}}')
     {showDeleteConfirmation=false;
     recordId = null;
     }"
     x-on:open-confirmation-modal.window="if($event.detail.name==='{{$name}}')
     {showDeleteConfirmation=true;
      recordId = $event.detail.id;
      }"
     x-on:keydown.escape.window="showDeleteConfirmation=false; recordId = null;"
     class="fixed inset-0 z-50 overflow-y-hidden mx-auto max-w-lg h-[50%] rounded-2xl border border-gray-700 bg-gray-900 p-6 shadow-2xl sm:p-8">
     <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-500/10 text-red-400" aria-hidden="true">
         <i class="fa-solid fa-trash-can"></i>
     </div>
     <h2 id="{{$name}}-heading" class="mt-5 text-xl font-bold text-white">{{$title}}</h2>
     <p class="mt-2 text-sm leading-6 text-gray-400">{{$message}}</p>
     <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
         <button type="button"
             @click="showDeleteConfirmation = false"
             class="inline-flex w-full items-center justify-center rounded-xl border border-gray-700 px-5 py-3 text-sm font-semibold text-gray-300 transition-colors hover:border-gray-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-900 sm:w-auto">Cancel</button>
         <button type="button"
             @click="$dispatch('confirmation-confirmed', { name: '{{$name}}', id: recordId }); showDeleteConfirmation = false; recordId = null;"
             class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-500 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 focus:ring-offset-gray-900 sm:w-auto">
             <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
             {{$confirmText}}
         </button>
     </div>
 </section>