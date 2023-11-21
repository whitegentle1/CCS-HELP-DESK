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
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
            rel="stylesheet"
        />

        <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
        <link
            href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css"
            rel="stylesheet"
        />
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
        <link
            rel="stylesheet"
            href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css"
            type="text/css"
        />
        <script src="{{ asset('assets/js/map.js') }}"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js']) @livewireStyles
    </head>

    <body
        class="bg-light-mode dark:bg-dark-mode items-center justify-center bg-cover bg-fixed bg-no-repeat"
    >
        <!-- <x-banner /> -->
        <div class="flex h-screen">
            <div class="flex flex-1 flex-col overflow-hidden">
                @include('layouts.auth.components.header')
                <div class="flex h-full">
                    <nav class="md:flex hidden h-full">
                        <div class="mx-auto flex w-full px-6 py-8">
                            <div
                                class="flex h-full w-full items-center justify-center border-gray-900 text-xl text-gray-900"
                            >
                                @include('layouts.auth.components.mainmenu')
                            </div>
                        </div>
                    </nav>
                    <main
                        class="mb-14 flex w-full flex-col overflow-y-auto overflow-x-hidden scrollbar"
                    >
                        <div class="mx-auto flex w-full px-6 py-8">
                            <div
                                class="flex h-screen w-screen flex-col border-gray-900 text-xl text-gray-900"
                            >
                                {{ $slot }}
                                @livewireScripts
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>

        <!--  -->
        @yield('content') @stack('modals')
    </body>
</html>
