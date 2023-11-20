<div
    class="sidebar p-4 relative hidden h-full sm:block w-[5rem] overflow-hidden border-r bg-blue-800 hover:w-56 hover:bg-blue-600 hover:shadow-lg"
>
    <div class="flex h-screen flex-col justify-between pb-6 pt-2">
        <div>
            <div
                class="align-center -m-2 mt-2 flex w-max justify-between space-x-4 p-2"
            >
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none"
                        >
                            <img
                                class="flex h-12 w-12 rounded-full object-cover"
                                src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}"
                            />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __("Manage Account") }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __("Profile") }}
                        </x-dropdown-link>

                        <div
                            class="border-t border-gray-200 dark:border-gray-600"
                        ></div>
                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                            x-data
                        >
                            @csrf
                            <x-dropdown-link
                                href="{{ route('logout') }}"
                                @click.prevent="$root.submit();"
                            >
                                {{ __("Log Out") }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

                <span class="text-xl font-bold text-white">
                    <p>
                        {{ ucfirst(Auth::user()->firstname) }}
                        {{ ucfirst(Auth::user()->lastname) }}
                    </p>
                    <p>
                        {{ substr(Auth::user()->email, 0, strpos(Auth::user()->email, '@')) }}
                    </p>
                </span>
            </div>
            <hr class="my-4 border-gray-200 dark:border-gray-600" />
            @include('layouts.auth.components.buttons')
        </div>
    </div>
</div>
