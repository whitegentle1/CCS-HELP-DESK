@props(['name'])
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
        class="h-min rounded w-full sm:max-w-md m-auto fixed inset-0 max-w-2xl overflow-y-aut dark:text-white"
    >
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
