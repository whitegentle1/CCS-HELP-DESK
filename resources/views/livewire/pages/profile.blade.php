<x-app-layout>
    <div class="flex w-[22.6rem] lg:w-[83rem] 3xl:w-[106rem] bg-blue-600/70 dark:bg-blue-950/70 rounded-lg">
        <div class="w-auto">
            <div class="text-white text-4xl font-bold p-10 flex">
                <div
                    class="bg-blue-900 p-1 rounded-full shadow-md mr-1 lg:mr-5 3xl:mr-8"
                >
                    <img
                        src="{{ Auth::user()->profilepicture }}"
                        alt="Profile Picture"
                        class="rounded-full object-cover h-[8.5rem] lg:h-[13rem] 3xl:h-[18rem]"
                    />
                </div>

                <div class=" lg:mt-10 3xl:mt-20 pl-3 lg:pl-8 3xl:pl-10">
                    <div class=" ml-[-0.6rem]">
                        <span
                            class="text-white "
                            x-data="{ capitalize: function(value) { return value.charAt(0).toUpperCase() + value.slice(1); } }"
                        >
                            <table>
                                <tr>
                                    <td
                                        class="text-2xl lg:text-3xl 3xl:text-4xl text-gray-800 dark:text-gray-200"
                                        x-data="{ firstname: '{{ ucfirst(auth()->user()->firstname) }}' }"
                                        x-text="capitalize(firstname)"
                                        x-on:profile-updated.window="firstname = capitalize($event.detail.firstname)"
                                    ></td>
                                    @if (Auth::user()->middlename)
                                    <td>&nbsp;</td>
                                    <td
                                        class="text-2xl lg:text-3xl 3xl:text-4xl text-gray-800 dark:text-gray-200"
                                        x-data="{ middlename: '{{ ucfirst(substr(auth()->user()->middlename, 0, 1)) }}.' }"
                                        x-text="middlename"
                                        x-on:profile-updated.window="middlename = $event.detail.middlename ? capitalize($event.detail.middlename[0]) + '.' : ''"
                                    ></td>
                                    @endif
                                    <td>&nbsp;</td>
                                    <td
                                        class="text-2xl lg:text-3xl 3xl:text-4xl text-gray-800 dark:text-gray-200"
                                        x-data="{ lastname: '{{ ucfirst(auth()->user()->lastname) }}' }"
                                        x-text="capitalize(lastname)"
                                        x-on:profile-updated.window="lastname = capitalize($event.detail.lastname)"
                                    ></td>
                                </tr>
                            </table>
                        </span>
                    </div>

                    <div class=" ml-[-0.4rem] text-lg lg:text-2xl 3xl:text-3xl pt-1 font-normal">
                        <p>
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                    <div class="text-sm lg:text-2xl 3xl:4xl p-2 w-44 lg:w-[18rem] 3xl:w-[20rem] rounded-sm mt-3 text-white">
                        <i class="bx bx-edit" style="color: #ffffff"></i>
                        <button
                            class="block w-full ml-[-1rem] px-4 py-2 transform rounded-md bg-blue-800 text-center text-white transition duration-200 ease-in hover:-translate-y-1 hover:border-transparent hover:bg-gray-600 hover:text-white active:translate-y-0 dark:bg-gray-500 dark:text-gray-900'"
                            wire:navigate
                            href="/edit-profile"
                        >
                            Update Information
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-5 lg:mt-0">
                <div class="text-blue-500 font-bold text-2xl lg:text-4xl 3xl:text-5xl px-3 lg:px-8 3xl:px-10">
                    <p>Personal Information</p>
                </div>

                <div class="flex mt-5 text-[1.12rem] lg:text-[1.52rem] 3xl:text-[1.82rem] lg:leading-[1.8rem] 3xl:leading-[2rem] px-2 lg:px-7 3xl:px-9">
                    <div class="w-[9rem] lg:w-[18rem] 3xl:w-[22rem]">
                        <div class=" text-gray-300">
                            <p>Birthday</p>
                        </div>

                        <div class="pt-1 text-gray-300">
                            <p>Course</p>
                        </div>

                        <div class="pt-1 text-gray-300">
                            <p>Contact Number</p>
                        </div>

                        <div class="pt-1 text-gray-300">
                            <p>Home Address</p>
                        </div>

                        <div class="pt-1 text-gray-300">
                            <p>Province</p>
                        </div>

                        <div class="pt-1 text-gray-300">
                            <p>Municipality</p>
                        </div>

                        <div class="pt-1 text-gray-300">
                            <p>Barangay</p>
                        </div>

                        <div class="pt-1 pb-3 text-gray-300">
                            <p>Zip Code</p>
                        </div>
                    </div>

                    <div class="w-96">
                        <div class="px-4 pt-1 text-gray-300">
                            <p>{{ Auth::user()->birthday }}</p>
                        </div>

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
