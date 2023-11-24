<!-- component -->
<nav
    class="border-blue-900 mb-10 border border-blue-950/60 bg-blue-700 dark:bg-blue-900/90 shadow-[rgba(0,_0,_0,_0.25)_0px_25px_50px_-12px] m-4 rounded-md"
>
    <div class="w-full mx-auto">
        <div class="mx-2 flex flex-wrap items-center justify-between">
            <a
                href="/home"
                wire:navigate
                class="flex items-center space-x-3 rtl:space-x-reverse"
            >
                <img
                    src="{{ asset('assets/imgs/logo.png') }}"
                    class="h-24 w-24 p-3"
                    alt="Dhvsu Logo"
                />
                <span
                    class="self-center whitespace-nowrap text-sm font-semibold text-gray-200 dark:text-white sm:text-2xl"
                    >DHVSU CCS Help Desk</span
                >
            </a>
            <div class="flex lg:hidden md:order-2">
                <button
                    data-collapse-toggle="mobile-menu-3"
                    type="button"
                    class="lg:hidden text-gray-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 rounded-lg inline-flex items-center justify-center"
                    aria-controls="mobile-menu-3"
                    aria-expanded="false"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg
                        class="w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <svg
                        class="hidden w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
            </div>
            <div
                class="hidden lg:flex justify-between items-end w-full md:w-auto md:order-1"
                id="mobile-menu-3"
            >
                <p
                    class="text-xl font-semibold text-gray-200 dark:text-white hidden lg:block"
                >
                    College of Computing Studies
                </p>
                <div
                    class="lg:hidden block absolute z-50 bg-blue-900/90 w-full m"
                >
                    <livewire:components.buttons />
                </div>
            </div>
        </div>
    </div>
</nav>
