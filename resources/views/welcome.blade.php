<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Welcome! DHVSU CCS Help Desk</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
        <script
            defer
            src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
        ></script>
        <link
            rel="stylesheet"
            href="{{ asset('assets/css/styles.css') }}"
            class="styles"
        />
        @livewireStyles
    </head>
    <body>
        @include('auth.register') @include('auth.login')
        @include('auth.forgot-password') @include('auth.confirm-password')
        @include('auth.two-factor-challenge') @if (auth()->user() &&
        !auth()->user()->hasVerifiedEmail()) @include('auth.verify-email')
        @endif
        <!-- Header Container -->
        <div class="inv_container">
            <div class="head_container" id="head_container">
                <div class="c_pic">
                    <a href="/" wire:navigate>
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
        <div
            class="w-screen flex flex-col lg:flex-row md:justify-between items-center justify-items-center"
        >
            <div
                id="default-carousel"
                class="relative w-full flex-1 lg:mt-10"
                data-carousel="slide"
            >
                <!-- Carousel wrapper -->
                <div
                    class="relative h-56 overflow-hidden rounded-lg sm:h-[400px] md:h-[500px] lg:h-[700px] lg:ml-10"
                >
                    <!-- Item 1 -->
                    <div
                        class="hidden duration-700 ease-in-out"
                        data-carousel-item
                    >
                        <img
                            src="{{ asset('assets/imgs/slide1.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="..."
                        />
                    </div>
                    <!-- Item 2 -->
                    <div
                        class="hidden duration-700 ease-in-out"
                        data-carousel-item
                    >
                        <img
                            src="{{ asset('assets/imgs/slide2.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="..."
                        />
                    </div>
                    <!-- Item 3 -->
                    <div
                        class="hidden duration-700 ease-in-out"
                        data-carousel-item
                    >
                        <img
                            src="{{ asset('assets/imgs/slide3.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="..."
                        />
                    </div>
                    <!-- Item 4 -->
                    <div
                        class="hidden duration-700 ease-in-out"
                        data-carousel-item
                    >
                        <img
                            src="{{ asset('assets/imgs/slide4.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="..."
                        />
                    </div>
                    <!-- Item 5 -->
                    <div
                        class="hidden duration-700 ease-in-out"
                        data-carousel-item
                    >
                        <img
                            src="{{ asset('assets/imgs/slide5.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="..."
                        />
                    </div>
                </div>
                <!-- Slider indicators -->
                <div
                    class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse lg:ml-10"
                >
                    <button
                        type="button"
                        class="w-3 h-3 rounded-full"
                        aria-current="true"
                        aria-label="Slide 1"
                        data-carousel-slide-to="0"
                    ></button>
                    <button
                        type="button"
                        class="w-3 h-3 rounded-full"
                        aria-current="false"
                        aria-label="Slide 2"
                        data-carousel-slide-to="1"
                    ></button>
                    <button
                        type="button"
                        class="w-3 h-3 rounded-full"
                        aria-current="false"
                        aria-label="Slide 3"
                        data-carousel-slide-to="2"
                    ></button>
                    <button
                        type="button"
                        class="w-3 h-3 rounded-full"
                        aria-current="false"
                        aria-label="Slide 4"
                        data-carousel-slide-to="3"
                    ></button>
                    <button
                        type="button"
                        class="w-3 h-3 rounded-full"
                        aria-current="false"
                        aria-label="Slide 5"
                        data-carousel-slide-to="4"
                    ></button>
                </div>
                <!-- Slider controls -->
                <button
                    type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none md:ml-10"
                    data-carousel-prev
                >
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
                    >
                        <svg
                            class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 6 10"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 1 1 5l4 4"
                            />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button
                    type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next
                >
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
                    >
                        <svg
                            class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 6 10"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 9 4-4-4-4"
                            />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <div
                class="flex flex-1 flex-col items-center justify-center text-center mb-36 md:mb-0 p-20"
            >
                <div>
                    <h1
                        class="text-center font-bold text-white text-[5vw] md:text-[3vw]"
                    >
                        Welcome to the CCS HELP DESK,<br />
                        CODE-HEARTED FOXES!
                    </h1>
                </div>
                @if (Route::has('login')) @auth
                <a
                    class="w-full max-w-[600px] h-10 sm:h-[15%] bg-[rgba(25,_75,_255,_0.76524323)] rounded-[50px] flex justify-center items-center no-underline m-0 hover:bg-blue-500 [transition:background-color_0.3s_ease] dark:bg-[rgba(12, 29, 91, 0.76524323)]"
                    wire:navigate
                    href="{{ url('/dashboard') }}"
                >
                    <h2 class="text-[2.5vw] font-bold text-[white]">
                        Get Started
                    </h2>
                </a>

                @else
                <a
                    class="w-full max-w-[600px] h-10 sm:h-[15%] bg-[rgba(25,_75,_255,_0.76524323)] rounded-[50px] flex justify-center items-center no-underline m-0 hover:bg-blue-500 [transition:background-color_0.3s_ease] dark:bg-[rgba(12, 29, 91, 0.76524323)]"
                    x-data
                    @click="$dispatch('open-modal',{name:'register'})"
                >
                    <h2 class="text-[2.5vw] font-bold text-[white]">
                        Get Started
                    </h2>
                </a>
                @endauth @endif
            </div>
        </div>

        <div class="absolute bottom-0 text-white">
            <p>www.csshelpdesksite.com | @csshelpdesksite</p>
        </div>
        @livewireScripts
    </body>
</html>
