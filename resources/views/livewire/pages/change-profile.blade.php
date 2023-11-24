<x-app-layout>
    <div
        class="w-full rounded-lg bg-blue-600/70 px-6 md:px-10 dark:bg-blue-950/70"
    >
        <div class="font-bold text-black">
            <div
                class="flex flex-row align-center items-center justify-center w-full md:p-4 text-xl"
            >
                <div class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md">
                    <a wire:navigate href="/edit-profile">User Information</a>
                </div>

                <div
                    class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md underline"
                >
                    <a>Change Picture</a>
                </div>

                <div class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md">
                    <a wire:navigate href="/change-password">Change Password</a>
                </div>
            </div>
            <div class="mt-6 p-4">
                <div class="text-2xl text-blue-900">
                    <p>Change Profile Picture</p>
                </div>
            </div>
        </div>

        <div class="min-h-screen flex flex-col justify-center items-center">
            <img
                src="https://www.svgrepo.com/show/426192/cogs-settings.svg"
                alt="Logo"
                class="mb-8 h-40"
            />
            <h1
                class="text-4xl md:text-5xl lg:text-6xl font-bold text-center text-gray-700 mb-4"
            >
                Site is under maintenance
            </h1>
            <p
                class="text-center text-gray-500 text-lg md:text-xl lg:text-2xl mb-8"
            >
                We're working hard to improve the user experience. Stay tuned!
            </p>
            <div class="flex space-x-4">
                <a
                    href="#"
                    class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded"
                    >Contact Us</a
                >
                <a
                    href="#"
                    class="border-2 border-gray-800 text-black font-bold py-3 px-6 rounded"
                    >Reload</a
                >
            </div>
        </div>
    </div>
</x-app-layout>
