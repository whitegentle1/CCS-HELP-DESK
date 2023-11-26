<?php
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {

    use WithFileUploads;

    public $profilepicture;

    public function mount(): void
    {
        $this->profilepicture = Auth::user()->profilepicture;
    }

    public function changeProfile(): void
    {
        $user = Auth::user();
        $validated = $this->validate(['profilepicture' => ['image','max:10240']]); //10 mb max;

        $imagePath = $this->file('profilepicture')-store('profile','public');
        $validated['profilepicture'] = $imagePath;
        $user->save();
        $this->dispatch('photo-updated', profilepicture: $user->profilepicture);
    }
}

?>

<x-app-layout>
    <div
        class="w-full rounded-lg bg-blue-600/70 px-6 md:px-10 dark:bg-blue-950/70"
    >
        <div class="font-bold text-black">
            <div
                class="flex flex-row align-center items-center justify-center w-full md:p-4 text-xl"
            >
                <div class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md text-white">
                    <a wire:navigate href="/edit-profile">User Information</a>
                </div>

                <div
                    class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md underline text-white"
                >
                    <a>Change Picture</a>
                </div>

                <div class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md text-white">
                    <a wire:navigate href="/change-password">Change Password</a>
                </div>
            </div>
            <div class="mt-6 p-4">
                <div class="text-2xl text-blue-900">
                    <p>Change Profile Picture</p>
                </div>
            </div>
        </div>

        {{-- PROFILE PICTURE CHANGE --}}
        <div class="flex flex-col items-center text-white ">

            <form wire:submit.prevent="changeProfile">
            <div class="flex flex-row lg:flex-row p-5 w-auto">
                <div class="mr-2 text-center shadow-md h-96 rounded-full">
                    {{-- FIX IT SO THAT ALL IMAGES UPLOADED ARE SQUARE! --}}
                    <img src="{{ Auth::user()->profilepicture }}"
                    alt="Profile Picture"
                    class="rounded-full object-cover w-96 h-96">
                </div>

                <div class="flex-row items-center justify-center p-20">
                    <div class="mb-8">
                        <input name="profilepicture" type="file" wire:model='profilepicture'>
                    </div>
                    @error('profilepicture')
                    <span class="text-sm text-red-500 italic"> {{ $message }} </span>
                    @enderror

                    <div class="  ">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                        <button wire:navigate href="{{ route('home') }}"
                            class="block w-full transform rounded-md bg-blue-800 px-2 py-1.5 text-center text-white transition duration-200 ease-in hover:-translate-y-1 hover:border-transparent hover:bg-gray-600 hover:text-white active:translate-y-0 dark:bg-gray-500 dark:text-gray-900">
                            {{ __('Cancel') }}
                        </button>
                    </div>
                </div>
            </div>
            </form>

            <div class="text-sm mt-2 mb-10">
                <div class="font-bold">
                    <p>Note: Acceptable File Formats and Size Limit</p>
                </div>
                <div class="text-sm">
                    <p>Please be advised that only image files in <u>JPEG, JPG, and PNG formats</u> will be accepted for attachment. Additionally, the maximum allowable size for attachment is <u>10 MB (megabytes)</u>.</p>
                </div>
            </div>
        </div>

        {{-- maintenance message lmao --}}
        {{-- <div class="min-h-screen flex flex-col justify-center items-center">
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
        </div> --}}
    </div>
</x-app-layout>
