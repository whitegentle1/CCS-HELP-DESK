@props(['name', 'title'])

<div
    x-data="{ show: @json($attributes->get('show')), name: '{{ $name }}' }"
    x-show="show"
    x-on:hashchange.window="show = (location.hash === '#'+name)"
    x-on:open-modal.window="($event.detail.name === name) ? (show = true, location.hash = '#'+name) : '';"
    x-on:close-modal.window="location.hash = '#'"
    x-on:keydown.escape.window="location.hash = '#'"
    style="display: none"
    class="fixed z-50 inset-0"
    x-transition.duration
>
    {{-- Gray Background --}}
    <div
        x-on:click="location.hash = '#'"
        class="fixed inset-0 bg-gray-300 opacity-40 dark:bg-gray-900 dark:opacity-60"
    ></div>

    {{-- Modal Body --}}
    <div
        class="bg-white h-min rounded w-full sm:max-w-md m-auto fixed inset-0 max-w-2xl overflow-y-auto dark:bg-gray-800 dark:text-white"
    >
        @if (isset($title))
        <div
            class="px-4 py-3 flex items-center justify-between border-gray-300"
        >
            <div class="text-xl text-gray-800">{{ $title }}</div>
            <a href="#">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </a>
        </div>
        @endif
        <div class="p-4">
            {{ $slot }}
        </div>
    </div>
</div>
