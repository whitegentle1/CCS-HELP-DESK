<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Welcome! CCS Help Desk</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        {{-- @livewireStyles --}}
    </head>
    <body>
        <div class="flex h-screen w-screen gap-1">
            {{-- Sidescreen --}}
            <div class="h-screen w-[18%] 2xl:text-[25px] lg:text-[20px] hidden sm:block bg-gray-900">
                <nav class="space-y-2">
                    <div class="my-7 flex flex-row justify-center items-center">
                        <img
                            class="h-[50px] mr-2"
                            src="https://cdn-icons-png.flaticon.com/512/9218/9218005.png"
                            alt=""
                        />
                        <p class="text-white text-[30px]">Admin</p>
                    </div>

                    <hr class="w-full" />

                    <p class="mt-3 px-4 text-gray-500">MENU</p>
                    <a
                        wire:navigate
                        href="/users"
                        class="block pb-2 px-8 text-white hover:bg-gray-700"
                        >Users</a
                    >
                    <a wire:navigate href="/news-update" class="block py-2 px-8 text-white hover:bg-gray-700"
                        >News Update</a
                    >
                    <a wire:navigate href="/payment" class="block py-2 px-8 text-white hover:bg-gray-700"
                        >Payment</a
                    >
                    <a wire:navigate href="/schedule" class="block py-2 px-8 text-white hover:bg-gray-700"
                        >Schedule</a
                    >
                </nav>
            </div>

            <div class="flex-1 flex flex-col gap-1 overflow-y-hidden">
                {{-- Header --}}
                <div class="h-[13%] w-full bg-gray-800 flex items-center">
                    <div class="ml-3 hidden sm:block w-full flex-wrap items-stretch">
                        <input
                            type="search"
                            placeholder="Search"
                            class="w-[500px] px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500"
                        />
                        <button
                            class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-500"
                        >
                            Search
                        </button>
                    </div>

                    <div class="flex items-center gap-x-3 ml-4 mr-3">
                        <img
                            class="inline-block h-[2.375rem] w-[2.375rem] rounded-full"
                            src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                            alt="Image Description"
                        />
                        <div class="grow">
                            <span class="block text-sm font-semibold text-gray-200"
                                >Christina Bersh</span
                            >
                        </div>
                    </div>

                    <nav class="md:hidden ml-auto mr-3 text-xs">
                        <input type="checkbox" id="menu-toggle" class="hidden">
                        <label for="menu-toggle" class="block p-2 text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 cursor-pointer">
                            Menu
                        </label>

                        <div class="menu-content hidden absolute right-0 mt-2 bg-gray-600 border rounded-lg shadow-md">
                            <a wire:navigate href="/users" class="block px-4 py-2 text-gray-300 hover:bg-black">
                                Users
                            </a>
                            <a wire:navigate href="/news-update" class="block px-4 py-2 text-gray-300 hover:bg-black">
                                News Update
                            </a>
                            <a wire:navigate href="/payment" class="block px-4 py-2 text-gray-300 hover:bg-black">
                                Payment
                            </a>
                            <a wire:navigate href="/schedule" class="block px-4 py-2 text-gray-300 hover:bg-black">
                                Schedule
                            </a>
                        </div>
                    </nav>

                    <style>
                        #menu-toggle:checked + label + .menu-content {
                            display: block;
                        }
                    </style>
                </div>

                {{-- Components --}}
                <div class="h-screen w-full bg-gray-500 overflow-hidden">
                    {{ $slot }}
                </div>
            </div>
        </div>
        {{-- @livewireScripts --}}
    </body>
</html>
