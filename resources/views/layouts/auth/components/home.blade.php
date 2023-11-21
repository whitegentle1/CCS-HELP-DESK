<x-app-layout>
    <!-- top part -->
    <div class="relative flex lg:flex-row flex-col h-full w-full">
        <!-- right -->
        <div class="flex flex-col flex-1 order-2">
            <div class="flex flex-row h-1/2">
                <div
                    class="w-full mx-2 my-1 p-1 bg-blue-100 border border-blue-800 rounded-lg"
                >
                    @include('layouts.auth.components.schedule')
                </div>
                @include('layouts.auth.components.map')
            </div>

            <div
                class="flex flex-col sm:flex-row h-1/2 mx-2 my-1 p-1 bg-blue-100 border border-blue-800 rounded-lg"
            >
                <p>Audit Trail</p>
            </div>
        </div>
        <!-- left -->
        <div
            class="order-1 bg-slate-900/75 rounded-xl flex-0 h-full w-full lg:flex-1 flex items-center justify-center justify-items-center"
        >
            @include('layouts.auth.components.news')
        </div>
    </div>
</x-app-layout>
