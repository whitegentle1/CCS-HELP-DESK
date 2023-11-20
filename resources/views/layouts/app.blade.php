<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>DHVSU CCS Help Desk</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        @vite(['resources/css/app.css', 'resources/js/app.js']) @livewireStyles
    </head>
    <body
        class="bg-light-mode dark:bg-dark-mode bg-cover bg-no-repeat bg-fixed fixed"
    >
        <x-banner />

        @include('layouts.auth.components.header')
        <div class="flex">
            @include('layouts.auth.components.mainmenu')
            <main class="flex-1 overflow-auto flex items-center justify-center">
                {{ $slot }}
            </main>
        </div>

        @stack('modals') @livewireScripts
    </body>
</html>
