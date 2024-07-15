<!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
<div x-data="{ open: false }" class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
    <div x-show="open" class="fixed inset-0 bg-gray-900/80" aria-hidden="true"></div>

    <div x-show="open" class="fixed inset-0 flex">

        <div  class="relative flex flex-1 w-full max-w-xs mr-16">
            <div x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="absolute top-0 flex justify-center w-16 pt-5 left-full">
                <button x-on-click="open=true" type="button" class="-m-2.5 p-2.5">
                    <span class="sr-only">Close sidebar</span>
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col px-6 pb-4 overflow-y-auto bg-white grow gap-y-5">
                <div class="flex items-center h-16 shrink-0">
                    <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=gray&shade=800"
                        alt="Your Company">
                </div>
                <nav class="flex flex-col flex-1">
                    <ul role="list" class="flex flex-col flex-1 gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li>
                                    <a href="#"
                                        class="flex p-2 text-sm font-semibold leading-6 text-gray-600 rounded-md group gap-x-3 bg-gray-50">
                                        <svg class="w-6 h-6 text-gray-600 shrink-0" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
