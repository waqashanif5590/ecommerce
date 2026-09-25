 <section class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">
     <div class="flex items-center justify-between border-b border-gray-800 pb-5">
         <div>
             <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">Account information</p>
             <h3 class="mt-1 text-xl font-bold text-white">Personal details</h3>
         </div>
         <i class="fa-solid fa-id-card text-orange-400"></i>
     </div>
     <dl class="grid gap-x-6 gap-y-6 pt-6 sm:grid-cols-2">
         <div>
             <dt class="text-xs font-semibold uppercase tracking-[0.15em] text-gray-500">Full name</dt>
             <dd class="mt-2 text-sm font-medium text-white">{{$user->name}}</dd>
         </div>
         <div>
             <dt class="text-xs font-semibold uppercase tracking-[0.15em] text-gray-500">Email address</dt>
             <dd class="mt-2 break-all text-sm font-medium text-white">{{$user->email}}</dd>
         </div>
         <div>
             <dt class="text-xs font-semibold uppercase tracking-[0.15em] text-gray-500">Phone number</dt>
             <dd class="mt-2 text-sm font-medium text-white">{{$user->phone}}</dd>
         </div>
         <div>
             <dt class="text-xs font-semibold uppercase tracking-[0.15em] text-gray-500">Preferred contact</dt>
             <dd class="mt-2 text-sm font-medium text-white">Email and WhatsApp</dd>
         </div>
         <div>
             <dt class="text-xs font-semibold uppercase tracking-[0.15em] text-gray-500">Last sign-in</dt>
             <dd class="mt-2 text-sm font-medium text-white">September 23, 2026 at 10:42 AM</dd>
         </div>
         <div>
             <dt class="text-xs font-semibold uppercase tracking-[0.15em] text-gray-500">Marketing emails</dt>
             <dd class="mt-2 text-sm font-medium text-emerald-300">Subscribed</dd>
         </div>
         @if(Auth::user()->role==='user')
         <a href="{{route('profile')}}" class="text-sm font-medium text-orange-400 hover:text-orange-300">Edit Profile</a>
         @endif
     </dl>
 </section>