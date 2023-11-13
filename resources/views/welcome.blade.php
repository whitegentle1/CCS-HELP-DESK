<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>
        <link
            rel="stylesheet"
            href="{{ asset('assets/css/styles.css') }}"
            class="styles"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        />
        <link
            href="https://cdn.lineicons.com/4.0/lineicons.css"
            rel="stylesheet"
        />
    </head>
    <body>
        <div
            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
        >
            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Dashboard</a
                >
                @else
                <a
                    href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</a
                >

                @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</a
                >
                @endif @endauth
            </div>
            @endif
        </div>
        <div class="inv_container">
            <div class="head_container" id="head_container">
                <div class="c_pic">
                    <a wire:click="home" class="cursor-pointer">
                        <img
                            src="{{ asset('assets/imgs/dv.png') }}"
                            alt="dabsu-logo"
                        />
                    </a>
                </div>
                <header>
                    <h1>DHVSU CCS HELP DESK</h1>
                </header>
                <h2>College of Computing Studies</h2>
            </div>
        </div>
        <div class="page-container landing-page" id="pageContainer">
            <div class="left_container">
                <div class="ccs_pic">
                    <img
                        src="{{ asset('assets/imgs/ccs.png') }}"
                        alt="CCS-logo"
                    />
                </div>
            </div>
            <div class="right_container">
                <div class="welcome">
                    <h1>
                        Welcome to the CCS HELP DESK,<br />
                        CODE-HEARTED FOXES!
                    </h1>
                </div>
                <button
                    x-data
                    x-on:click="$dispatch('open-modal')"
                    class="get-started"
                >
                    <h2>Get Started</h2>
                </button>
            </div>
        </div>
    </body>
</html>
