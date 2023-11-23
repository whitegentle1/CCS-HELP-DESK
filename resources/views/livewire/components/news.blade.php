<div id="controls-carousel" class="relative h-full w-full" data-carousel="static" wire:ignore>
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-full">
        <!-- Item 1 -->
        <p class="left-5 p-10 text-xl text-white">News and Updates</p>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <a href="https://fb.watch/oul9CDPoMU/" target="_blank">
                <img src="{{ asset('assets/imgs/news1.png') }}"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 cursor-pointer object-contain transition-all duration-500 sm:hover:object-scale-down"
                    alt="..." />
            </a>
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <a href="https://www.facebook.com/photo/?fbid=875734351232960&set=a.429806609159072" target="_blank">
                <img src="{{ asset('assets/imgs/news2.png') }}"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 cursor-pointer object-contain transition-all duration-500 sm:hover:object-scale-down"
                    alt="..." />
        </div>
        </a>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <a href="https://www.facebook.com/dhvsu.ccssc/posts/pfbid02R2tVjNe8gTAEShZ3vk396TBzVZe7wuMJTFtcVnEKjGarh9ZSHVWPA1gdT3ALAZugl"
                target="_blank">
                <img src="{{ asset('assets/imgs/news3.png') }}"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 cursor-pointer object-contain transition-all duration-500 sm:hover:object-scale-down"
                    alt="..." />
        </div>
        </a>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <a href="https://www.facebook.com/dhvsu.ccssc/posts/pfbid0SVxryEqdURPDAAsXpzFVKSFUnxzWjm3KEhpv68TdLNuNV5rkJZcd21LVUxJQ25YLl"
                target="_blank">
                <img src="{{ asset('assets/imgs/news4.png') }}"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 cursor-pointer object-contain transition-all duration-500 sm:hover:object-scale-down"
                    alt="..." />
            </a>
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <a href="https://www.facebook.com/dhvsu.ccssc/posts/pfbid0HK22tDjT2i6WZKiKYsJXs83N5C6AasmUkKm1Hyx28piD3pmhuxS3ED65uHb7XyBTl"
                target="_blank">
                <img src="{{ asset('assets/imgs/news5.png') }}"
                    class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2 cursor-pointer object-contain transition-all duration-500 sm:hover:object-scale-down"
                    alt="..." />
            </a>
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button"
        class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
            <svg class="h-4 w-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="group absolute end-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
            <svg class="h-4 w-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
