<x-guest-layout>
    <livewire:pages.auth.login lazy />
    <livewire:pages.auth.register lazy />
    <livewire:pages.auth.verify-email lazy />
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
        class="w-screen flex flex-col xl:flex-row md:justify-between items-center justify-items-center"
    >
        <livewire:carousel />
        <div
            class="flex flex-1 flex-col items-center justify-center text-center mb-36 md:mb-0"
        >
            <div>
                <h1
                    class="text-center font-bold text-white text-[5vw] md:text-[4vw] sm:text-[4vw]"
                >
                    Welcome to the CCS HELP DESK,<br />
                    CODE-HEARTED FOXES!
                </h1>
            </div>
            @if (Route::has('login')) @auth
            <a
                class="w-full max-w-[600px] h-10 sm:h-[15%] bg-[rgba(25,_75,_255,_0.76524323)] rounded-[50px] flex justify-center items-center no-underline m-0 hover:bg-blue-500 [transition:background-color_0.3s_ease] dark:bg-[rgba(12, 29, 91, 0.76524323)]"
                wire:navigate
                href="/home"
            >
                <h2 class="text-[6.5vw] lg:text-[2.5vw] font-bold text-[white]">
                    Get Started
                </h2>
            </a>
            @else
            <a
                class="w-full max-w-[600px] lg:text-[2.5vw] h-10 sm:h-[15%] bg-[rgba(25,_75,_255,_0.76524323)] rounded-[50px] flex justify-center items-center no-underline m-0 hover:bg-blue-500 [transition:background-color_0.3s_ease] dark:bg-[rgba(12, 29, 91, 0.76524323)]"
                x-data
                @click="$dispatch('open-modal',{name:'Login'})"
            >
                <h2 class="text-[6.5vw] lg:text-[2.5vw] font-bold text-[white]">
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
</x-guest-layout>
