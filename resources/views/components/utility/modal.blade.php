{{-- success, info, warning, danger --}}
@props([
    'type' => 'info',
    'show' => true,
    'title' => null,
    'titleInfo' => null,
    'showCloseButton' => true,
    'maxWidth' => '2xl',
])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        '3xl' => 'sm:max-w-3xl',
        '4xl' => 'sm:max-w-4xl',
        '5xl' => 'sm:max-w-5xl',
    ][$maxWidth];
@endphp

<div x-data="{
    modalOpen: @js($show),
    showCloseButton: @js($showCloseButton),
}" class="relative z-20 w-full" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div x-show="modalOpen" x-cloak class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-50 backdrop-blur-sm"></div>

    <div x-cloak x-show="modalOpen" class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex items-end justify-center w-full min-h-full pt-5 text-center sm:items-center sm:p-0">
            <div x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="pacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                {{ $attributes->merge(['class' => "relative px-6 pt-10 pb-8 overflow-hidden text-left transition-all transform bg-white shadow-xl rounded-xl sm:my-15 w-full $maxWidth sm:p-15"]) }}>

                <div x-show="showCloseButton" class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                    <button x-on:click="$wire.$dispatch('closeModal')" type="button"
                        class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span class="sr-only">Close</span>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="">
                    <div class="flex items-center mt-3 space-x-2 text-center sm:mt-0 sm:text-left">
                        @switch($type)
                            @case('success')
                                <x-heroicon-s-exclamation-circle class="w-6 h-6 text-emerald-600" />
                            @break

                            @case('info')
                                <x-heroicon-s-exclamation-circle class="w-6 h-6 text-blue-600" />
                            @break

                            @case('warning')
                                <x-heroicon-s-exclamation-circle class="w-6 h-6 text-orange-600" />
                            @break

                            @case('danger')
                                <x-heroicon-s-exclamation-circle class="w-6 h-6 text-red-600" />
                            @break

                            <x-heroicon-s-exclamation-circle class="w-6 h-6 text-emerald-600" />

                            @default
                        @endswitch
                        <h3 class="flex flex-wrap items-center text-lg font-bold leading-6 text-gray-900 sm:text-xl" id="modal-title">
                            @if (isset($header))
                                {{ $header }}
                            @elseif(isset($title))
                                <span>
                                    {{ $title }}
                                </span>
                                @if (isset($titleInfo))
                                    <span class="text-sm font-semibold text-gray-500 uppercase sm:ml-1">
                                        {{ $titleInfo }}
                                    </span>
                                @endif
                            @else
                                <span>Modal Header</span>
                            @endif
                        </h3>
                    </div>

                    <main class="mt-2 mb-4">
                        {{ $slot }}
                    </main>

                </div>
                {{ $footerButtons ?? '' }}
            </div>
        </div>
    </div>
</div>
