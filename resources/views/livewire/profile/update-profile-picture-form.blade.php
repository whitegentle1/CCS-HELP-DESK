<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

new class extends Component
{
    use WithFileUploads;

    #[Validate('image|max:10240')]
    public $profilepicture;

    public function changeProfile()
    {
        try {
            $this->validate(['profilepicture' => ['image', 'max:10240']]); }
catch (ValidationException $e) { $this->reset('profilepicture'); throw $e; }
$user = Auth::user(); $oldProfilePicture = $user->profilepicture; if
($this->profilepicture) { $user->profilepicture = url('storage/' .
$this->profilepicture->store('profile-photos', 'public')); $user->save(); }
$this->logProfilePictureChange($oldProfilePicture, $user->profilepicture);
$this->dispatch('profile-updated', ['profilepicture' => $user->profilepicture]);
} private function logProfilePictureChange($oldProfilePicture,
$newProfilePicture) { $dt = Carbon::now('Asia/Singapore'); $todayDate =
$dt->toDayDateTimeString(); $email = Auth::user()->email; $log_history = [
'email' => $email, 'activity' => 'Update Profile Picture', 'ip_address' =>
request()->ip(), 'user_agent' => request()->userAgent(), 'login_time' =>
$todayDate, ]; DB::table('login_history')->insert($log_history); } } ?>

<div class="w-full rounded-lg bg-blue-600/70 px-6 md:px-10 dark:bg-blue-950/70">
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
    <div class="flex flex-col items-center">
        <form wire:submit="changeProfile">
            <div class="flex flex-row lg:flex-row p-5 w-auto">
                {{-- Profile Picture Preview --}}
                @if ($profilepicture)
                <img
                    src="{{ $profilepicture->temporaryUrl() }}"
                    alt="Profile Picture"
                    class="mr-2 rounded-full object-cover"
                    style="height: 275px; width: 275px"
                />
                @else
                <img
                    src="{{ Auth::user()->profilepicture }}"
                    alt="Profile Picture"
                    class="rounded-full object-cover"
                    style="height: 275px; width: 275px"
                />
                @endif

                {{-- Profile Picture Upload --}}
                <div class="flex-row items-center justify-center p-20">
                    <div class="mb-8 text-white">
                        <input
                            name="profilepicture"
                            accept="image/png, image/jpeg, image/jpg"
                            type="file"
                            wire:model="profilepicture"
                            id="profilepicture"
                        />
                    </div>
                    <div
                        wire:loading
                        wire:target="profilepicture"
                        class="text-green-600"
                    >
                        Uploading...
                    </div>
                    @error('profilepicture')
                    <span class="text-sm text-red-600 italic">
                        {{ $message }}
                    </span>
                    @enderror

                    <div class="  ">
                        <x-primary-button>{{ __("Update") }}</x-primary-button>
                        <button
                            wire:navigate
                            href="{{ route('home') }}"
                            class="block w-full transform rounded-md bg-blue-800 px-2 py-1.5 text-center text-white transition duration-200 ease-in hover:-translate-y-1 hover:border-transparent hover:bg-gray-600 hover:text-white active:translate-y-0 dark:bg-gray-500 dark:text-gray-900"
                        >
                            {{ __("Cancel") }}
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <div class="text-sm mt-2 mb-10 text-white">
            <div class="font-bold">
                <p>Note: Acceptable File Formats and Size Limit</p>
            </div>
            <div class="text-sm">
                <p>
                    Please be advised that only image files in
                    <u>GIF, JPEG, JPG, and PNG formats</u> will be accepted for
                    attachment. Additionally, the maximum allowable size for
                    attachment is <u>10 MB (megabytes)</u>.
                </p>
            </div>
        </div>
    </div>
</div>
