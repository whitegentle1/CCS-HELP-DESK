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

                <div class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md">
                    <a wire:navigate href="/change-profile">Change Picture</a>
                </div>

                <div
                    class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md underline"
                >
                    <a>Change Password</a>
                </div>
            </div>
            <div class="mt-6 p-4">
                <div class="text-2xl text-blue-900">
                    <p>Change Password</p>
                </div>
            </div>
        </div>

        <livewire:profile.update-password-form />
    </div>
</x-app-layout>
