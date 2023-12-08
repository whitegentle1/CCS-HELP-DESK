<div
    class="sidebar relative z-20 hidden min-h-min w-[5rem] shrink-0 grow-0 justify-around self-center overflow-hidden rounded-lg border border-r border-t border-gray-200 bg-blue-800 bg-white/50 p-2.5 shadow-lg backdrop-blur-lg hover:w-56 hover:bg-blue-600 hover:shadow-lg dark:border-blue-600/60 dark:bg-blue-800/50 lg:block"
>
    <div class="flex flex-col justify-between pb-6 pt-2">
        <div>
            <div
                class="align-center -m-2 mt-2 flex w-max justify-between space-x-4 p-2"
            >
                <button
                    href="/profile"
                    wire:navigate
                    class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none"
                >
                    <img
                        class="flex h-12 w-12 rounded-full object-cover"
                        src="{{ Auth::user()->profilepicture }}"
                        alt="{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}"
                    />
                </button>

                <span
                    class="text-white"
                    x-data="{ capitalize: function(value) { return value.charAt(0).toUpperCase() + value.slice(1); } }"
                >
                    <table>
                        <tr>
                            <td
                                class="font-medium text-base text-gray-800 dark:text-gray-200"
                                x-data="{ firstname: '{{ ucfirst(auth()->user()->firstname) }}' }"
                                x-text="capitalize(firstname)"
                                x-on:profile-updated.window="firstname = capitalize($event.detail.firstname)"
                            ></td>
                            @if (Auth::user()->middlename)
                            <td
                                class="font-medium text-base text-gray-800 dark:text-gray-200"
                                x-data="{ middlename: '{{ ucfirst(substr(auth()->user()->middlename, 0, 1)) }}.' }"
                                x-text="middlename"
                                x-on:profile-updated.window="middlename = $event.detail.middlename ? capitalize($event.detail.middlename[0]) + '.' : ''"
                            ></td>
                            @endif

                            <td
                                class="font-medium text-base text-gray-800 dark:text-gray-200"
                                x-data="{ lastname: '{{ ucfirst(auth()->user()->lastname) }}' }"
                                x-text="capitalize(lastname)"
                                x-on:profile-updated.window="lastname = capitalize($event.detail.lastname)"
                            ></td>
                        </tr>
                    </table>
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
