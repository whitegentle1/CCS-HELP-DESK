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
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body
        class="flex flex-col h-screen"
        style="background-image: url('{{ asset('assets/imgs/BG.jpg') }}')"
    >
        <x-banner />
        <div class="flex flex-col">
            <!-- header -->
            @include('layouts.auth.components.header')
            <div class="flex-1 flex flex-row mt-1">
                <!-- left Drawer -->
                <div
                    class="group w-20 bg-blue-950 h-[88vh] rounded-md relative transition-all duration-200 transform hover:w-60"
                >
                    @include('layouts.auth.components.usermenu')
                    @include('layouts.auth.components.mainmenu')
                </div>
                <div
                    class="flex 1 content-center justify-center items-center object-center"
                >
                    {{ $slot }}
                </div>
            </div>
        </div>

        @stack('modals') @livewireScripts
    </body>
</html>
