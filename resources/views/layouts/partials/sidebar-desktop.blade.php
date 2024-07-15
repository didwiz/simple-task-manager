 <!-- Static sidebar for desktop -->
 <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
     <!-- Sidebar component, swap this element with another sidebar if you like -->
     <div class="flex flex-col px-6 pb-4 overflow-y-auto bg-white border-r border-gray-200 grow gap-y-5">
         <div class="flex items-center h-16 shrink-0">
             <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=gray&shade=600"
                 alt="Your Company">
         </div>
         <nav class="flex flex-col flex-1">
             <ul role="list" class="flex flex-col flex-1 gap-y-7">
                 <li>
                     <ul role="list" class="-mx-2 space-y-1">
                         <li>
                             <!-- Current: "bg-gray-50 text-gray-600", Default: "text-gray-700 hover:text-gray-600 hover:bg-gray-50" -->
                             <a href="{{ route('dashboard') }}"
                                 class="flex p-2 text-sm font-semibold leading-6 text-gray-600 rounded-md group gap-x-3 bg-gray-50">
                                 <x-heroicon-o-folder-open class="w-6 h-6 text-gray-600 shrink-0" />
                                 Projects
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li>
                     <div class="text-xs font-semibold leading-6 text-gray-400">Your teams</div>
                     <ul role="list" class="mt-2 -mx-2 space-y-1">
                         <li>
                             <!-- Current: "bg-gray-50 text-gray-600", Default: "text-gray-700 hover:text-gray-600 hover:bg-gray-50" -->
                             <a href="#"
                                 class="flex p-2 text-sm font-semibold leading-6 text-gray-700 rounded-md group gap-x-3 hover:bg-gray-50 hover:text-gray-600">
                                 <span
                                     class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-200 bg-white text-[0.625rem] font-medium text-gray-400 group-hover:border-gray-600 group-hover:text-gray-600">H</span>
                                 <span class="truncate">Heroicons</span>
                             </a>
                         </li>
                         <li>
                             <a href="#"
                                 class="flex p-2 text-sm font-semibold leading-6 text-gray-700 rounded-md group gap-x-3 hover:bg-gray-50 hover:text-gray-600">
                                 <span
                                     class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-200 bg-white text-[0.625rem] font-medium text-gray-400 group-hover:border-gray-600 group-hover:text-gray-600">T</span>
                                 <span class="truncate">Tailwind Labs</span>
                             </a>
                         </li>
                         <li>
                             <a href="#"
                                 class="flex p-2 text-sm font-semibold leading-6 text-gray-700 rounded-md group gap-x-3 hover:bg-gray-50 hover:text-gray-600">
                                 <span
                                     class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-200 bg-white text-[0.625rem] font-medium text-gray-400 group-hover:border-gray-600 group-hover:text-gray-600">W</span>
                                 <span class="truncate">Workcation</span>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="mt-auto">
                     <a href="#"
                         class="flex p-2 -mx-2 text-sm font-semibold leading-6 text-gray-700 rounded-md group gap-x-3 hover:bg-gray-50 hover:text-gray-600">
                         <svg class="w-6 h-6 text-gray-400 shrink-0 group-hover:text-gray-600" fill="none"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                         </svg>
                         Settings
                     </a>
                 </li>
             </ul>
         </nav>
     </div>
 </div>
