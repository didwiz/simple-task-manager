<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>

<body class="h-full font-sans antialiased">
    <div>
        @include('layouts.partials.sidebar-mobile')

        @include('layouts.partials.sidebar-desktop')

        <div class="lg:pl-72">
            @include('layouts.partials.top-navigation')

            <main class="py-10 mx-auto max-w-8xl sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
    </div>
    <x-flash-message />
</body>

</html>
