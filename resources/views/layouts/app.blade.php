<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="flex flex-col">
            @include('layouts.auth.components.header')
            <div class="flex-1 flex flex-row mt-1">
                <!-- left Drawer -->

                <div
                    class="bg-blue-950 h-[88vh] relative duration-200 drawer w-20"
                >
                    @include('layouts.auth.components.usermenu')
                    @include('layouts.auth.components.mainmenu')
                </div>
                <div class="flex 1">
                    {{ $slot }}
                </div>
            </div>
        </div>
        <main class="bg-gray-400 flex-1 ml-1">
            <div class="grid grid-cols-4 h-full"></div>
        </main>

        @stack('modals') @livewireScripts
        <script src="{{ asset('assets/js/js.js') }}"></script>
    </body>
</html>
