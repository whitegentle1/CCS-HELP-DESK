<div
    class="sidebar relative z-20 hidden min-h-min w-[5rem] shrink-0 grow-0 justify-around self-center overflow-hidden rounded-lg border border-r border-t border-gray-200 bg-blue-800 bg-white/50 p-2.5 shadow-lg backdrop-blur-lg hover:w-56 hover:bg-blue-600 hover:shadow-lg dark:border-blue-600/60 dark:bg-blue-800/50 sm:block"
>
    <div class="flex flex-col justify-between pb-6 pt-2">
        <div>
            <div
                class="align-center -m-2 mt-2 flex w-max justify-between space-x-4 p-2"
            >
                <button
                    class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none"
                >
                    <img
                        class="flex h-12 w-12 rounded-full object-cover"
                        src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->firstname }}"
                    />
                </button>

                <span class="text-white">
                    <p
                        class="{{ strlen(Auth::user()->firstname . ' ' . Auth::user()->lastname) > 13 ? 'text-[0.70rem]' : 'text-xl' }} text-xl font-bold"
                    >
                        {{ ucfirst(Auth::user()->firstname) }}
                        <!-- kapag may middle name -->
                        @if (Auth::user()->middlename)
                        {{ ucfirst(Auth::user()->middlename[0]) }}. @endif

                        {{ ucfirst(Auth::user()->lastname) }}
                    </p>
                    <p>
                        {{ substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@')) }}
                    </p>
                </span>
            </div>
            <hr class="my-4 border-gray-200 dark:border-gray-600" />
            <livewire:components.buttons />
        </div>
    </div>
</div>
