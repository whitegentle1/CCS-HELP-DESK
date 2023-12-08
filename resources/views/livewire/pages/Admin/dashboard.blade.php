<x-admin-layout>
    <div class="h-screen w-[100%] bg-gray-500 overflow-y-auto">
        <div class="mt-8">
            {{-- User Table --}}
            <!-- Table Section -->
            <div class="w-[75rem] mx-auto">
                <!-- Card -->
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div
                            class="p-1.5 min-w-full inline-block align-middle"
                        ></div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Table Section -->

            {{-- News Update Table --}}
            <div class="my-8">
                <table
                    class="w-[75rem] mx-auto border-collapse bg-gray-300 text-left text-lg text-gray-500 rounded-xl overflow-hidden"
                >
                    <thead class="bg-gray-300">
                        <tr>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-black"
                            >
                                Image
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-black flex justify-centers"
                            >
                                Link
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-black"
                            ></th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-black"
                            ></th>
                            <th
                                scope="col"
                                class="px-6 py-4 font-medium text-black flex justify-end"
                            >
                                <button
                                    class="rounded-lg px-5 bg-blue-500 hover:bg-white"
                                >
                                    Add
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody
                        class="divide-y divide-gray-100 border-t border-gray-100"
                    >
                        <tr class="bg-gray-300">
                            <th class="px-6 py-4 font-medium text-black">
                                <img
                                    class="h-24"
                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                />
                            </th>
                            <td class="px-6 py-4 text-sm flex">
                                <div
                                    class="overflow-hidden overflow-ellipsis whitespace-nowrap max-w-[80vh] text-gray-800"
                                >
                                    https://www.facebook.com/dhvsu.ccssc/posts/pfbid0HK22tDjT2i6WZKiKYsJXs83N5C6AasmUkKm1Hyx28piD3pmhuxS3ED65uHb7XyBTl
                                </div>
                            </td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td
                                class="flex justify-end mt-8 gap-4 px-6 py-4 font-medium"
                            >
                                <a href="">Delete</a>
                                <a href="" class="text-primary-700">Edit</a>
                            </td>
                        </tr>
                        <tr class="bg-gray-300">
                            <th class="px-6 py-4 font-medium text-black">
                                <img
                                    class="h-24"
                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                />
                            </th>
                            <td class="px-6 py-4 text-sm flex">
                                <div
                                    class="overflow-hidden overflow-ellipsis whitespace-nowrap max-w-[80vh] text-gray-800"
                                >
                                    https://www.facebook.com/dhvsu.ccssc/posts/pfbid0HK22tDjT2i6WZKiKYsJXs83N5C6AasmUkKm1Hyx28piD3pmhuxS3ED65uHb7XyBTl
                                </div>
                            </td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td
                                class="flex justify-end mt-8 gap-4 px-6 py-4 font-medium"
                            >
                                <a href="">Delete</a>
                                <a href="" class="text-primary-700">Edit</a>
                            </td>
                        </tr>
                        <tr class="bg-gray-300">
                            <th class="px-6 py-4 font-medium text-black">
                                <img
                                    class="h-24"
                                    src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                />
                            </th>
                            <td class="px-6 py-4 text-sm flex">
                                <div
                                    class="overflow-hidden overflow-ellipsis whitespace-nowrap max-w-[80vh] text-gray-800"
                                >
                                    https://www.facebook.com/dhvsu.ccssc/posts/pfbid0HK22tDjT2i6WZKiKYsJXs83N5C6AasmUkKm1Hyx28piD3pmhuxS3ED65uHb7XyBTl
                                </div>
                            </td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                            <td
                                class="flex justify-end mt-8 gap-4 px-6 py-4 font-medium"
                            >
                                <a href="">Delete</a>
                                <a href="" class="text-primary-700">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
