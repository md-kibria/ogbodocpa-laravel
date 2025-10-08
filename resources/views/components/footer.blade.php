 <footer class="bg-slate-700">
     <div class="mx-auto max-w-screen-xl space-y-8 px-4 py-16 sm:px-6 lg:space-y-16 lg:px-8">
         <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
             <div>
                 <a href="{{ route('home') }}">
                     @if ($info->footer_logo)
                         <img src="{{ asset('/storage/' . $info->footer_logo) }}" alt="" class="h-[70px] w-auto">
                     @else
                         <h1 class="text-2xl font-bold text-slate-100">Logo</h1>
                     @endif
                 </a>

                 <p class="mt-4 max-w-xs text-gray-300">
                     {{ $info->footer_description }}
                 </p>

                 <ul class="mt-8 flex gap-6">
                     @foreach ($media as $link)
                         @if ($link->url)
                             <li>
                                 <a href="{{ $link->url }}" class="text-3xl transition hover:opacity-60 text-white"
                                     target="_blank" rel="noopener noreferrer">
                                     <ion-icon name="logo-{{ $link->name }}"></ion-icon>
                                 </a>
                             </li>
                         @endif
                     @endforeach
                 </ul>
             </div>

             <div class="grid grid-cols-2 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-4">
                 <div>
                     <p class="text-xl font-medium text-gray-100">Content</p>

                     <ul class="mt-6 space-y-4 text-sm">
                         <li>
                             <a href="{{ route('services') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> Services </a>
                         </li>

                         <li>
                             <a href="{{ route('appointment') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> Appointment </a>
                         </li>

                         <li>
                             <a href="{{ route('contact') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> Contact </a>
                         </li>
                     </ul>
                 </div>

                 <div>
                     <p class="text-xl font-medium text-gray-100">Company</p>

                     <ul class="mt-6 space-y-4 text-sm">
                         <li>
                             <a href="{{ route('home') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> Home </a>
                         </li>

                         <li>
                             <a href="{{ route('about') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> About </a>
                         </li>

                         <li>
                             <a href="{{ route('contact') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> Contact </a>
                         </li>
                     </ul>
                 </div>

                 <div>
                     <p class="text-xl font-medium text-gray-100">Helpful Links</p>

                     <ul class="mt-6 space-y-4 text-sm">
                         <li>
                             <a href="{{ route('services') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> Services </a>
                         </li>

                         <li>
                             <a href="{{ route('resources') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> Resources </a>
                         </li>

                         <li>
                             <a href="{{ route('appointment') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> Appointment </a>
                         </li>
                     </ul>
                 </div>

                 <div>
                     <p class="text-xl font-medium text-gray-100">Account</p>

                     <ul class="mt-6 space-y-4 text-sm">
                         <li>
                             <a href="{{ route('profile') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> Profile </a>
                         </li>

                         <li>
                             <a href="{{ route('profile.appointments') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> Appointments </a>
                         </li>

                         <li>
                             <a href="{{ route('signup') }}"
                                 class="text-gray-400 transition hover:opacity-75 hover:pl-2 duration-200"> <span
                                     class="text-white text-2xl">»</span> SignUp </a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>

         <p class="text-xs text-gray-200">&copy; {{ date('Y') }} All rights reserved – {{ $info->title }}</p>
     </div>
 </footer>
