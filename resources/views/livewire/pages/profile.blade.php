<x-app-layout>
    <div class="flex w-auto bg-blue-600/70 dark:bg-blue-950/70 rounded-lg">
        <div class="w-auto">
            <div class="text-white text-4xl font-bold p-10 flex">
                <div
                    class="bg-blue-900 p-1 text-sm text-center rounded-full shadow-md w-44 h-38 mr-2"
                >
                    <img
                        src="image/profile.jpg"
                        alt="Profile Picture"
                        class="rounded-full w-auto h-auto object-cover"
                    />
                </div>

                <div class="p-6">
                    <div class="">
                        <span
                            class="text-white"
                            x-data="{ capitalize: function(value) { return value.charAt(0).toUpperCase() + value.slice(1); } }"
                        >
                            <table>
                                <tr>
                                    <td
                                        class="text-2xl text-gray-800 dark:text-gray-200"
                                        x-data="{ firstname: '{{ ucfirst(auth()->user()->firstname) }}' }"
                                        x-text="capitalize(firstname)"
                                        x-on:profile-updated.window="firstname = capitalize($event.detail.firstname)"
                                    ></td>
                                    @if (Auth::user()->middlename)
                                    <td>&nbsp;</td>
                                    <td
                                        class="text-2xl text-gray-800 dark:text-gray-200"
                                        x-data="{ middlename: '{{ ucfirst(substr(auth()->user()->middlename, 0, 1)) }}.' }"
                                        x-text="middlename"
                                        x-on:profile-updated.window="middlename = $event.detail.middlename ? capitalize($event.detail.middlename[0]) + '.' : ''"
                                    ></td>
                                    @endif
                                    <td>&nbsp;</td>
                                    <td
                                        class="text-2xl text-gray-800 dark:text-gray-200"
                                        x-data="{ lastname: '{{ ucfirst(auth()->user()->lastname) }}' }"
                                        x-text="capitalize(lastname)"
                                        x-on:profile-updated.window="lastname = capitalize($event.detail.lastname)"
                                    ></td>
                                </tr>
                            </table>
                        </span>
                    </div>

                    <div class="text-sm pt-1 font-normal">
                        <p>
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                    <div class="text-sm p-2 w-44 rounded-sm mt-4 text-white">
                        <i class="bx bx-edit" style="color: #ffffff"></i>
                        <button
                            class="'mb-1.5 block w-full transform rounded-md bg-blue-800 px-2 py-1.5 text-center text-white transition duration-200 ease-in hover:-translate-y-1 hover:border-transparent hover:bg-gray-600 hover:text-white active:translate-y-0 dark:bg-gray-500 dark:text-gray-900'"
                            wire:navigate
                            href="/edit-profile"
                        >
                            Update Information
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-10">
                <div class="text-blue-900 font-bold text-xl px-4">
                    <p>Personal Information</p>
                </div>

                <div class="flex mt-4">
                    <div class="w-80">
                        <div class="px-4 pt-1 text-gray-300">
                            <p>Birthday</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>Course</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>Contact Number</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>Home Address</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>Province</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>Municipality</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>Barangay</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>Zip Code</p>
                        </div>
                    </div>

                    <div class="w-96">
                        <div class="px-4 pt-1 text-gray-300">
                            <p>{{ Auth::user()->birthday }}</p>
                        </div>
                        <!-- auth user tapos yung name sa table -->
                        <div class="px-4 pt-1 text-gray-300">
                            <p>{{ Auth::user()->course }}</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>{{ Auth::user()->contact }}</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>{{ Auth::user()->address }}</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>{{ Auth::user()->province }}</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>{{ Auth::user()->city }}</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>{{ Auth::user()->barangay }}</p>
                        </div>

                        <div class="px-4 pt-1 text-gray-300">
                            <p>{{ Auth::user()->zip }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
