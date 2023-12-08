<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

new #[Layout('layouts.guest')] class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate( [ 'current_password' => ['required',
'string', 'current_password'], 'password' => [ 'required', 'string',
Password::min(8) ->mixedCase() ->numbers() ->symbols() ->uncompromised(),
'different:current_password', 'confirmed', ], ], [ 'password.regex' => 'The
password must be at least 8 characters long, contain at least one uppercase
letter, and have at least one special character (!@#$%^&*).',
'password.different' => 'The new password must be different from the current
password.', ], ); } catch (ValidationException $e) {
$this->reset('current_password', 'password', 'password_confirmation'); throw $e;
} $dt = Carbon::now('Asia/Manila'); $todayDate = $dt->toDayDateTimeString();
$log_history = [ 'email' => Auth::user()->email, 'activity' => 'Change
Password', 'ip_address' => request()->ip(), 'user_agent' =>
request()->userAgent(), 'logout_time' => $todayDate ];
DB::table('login_history')->insert($log_history);
Auth::user()->update(['password' => Hash::make($validated['password'])]);
$this->reset('current_password', 'password', 'password_confirmation');
$this->dispatch('password-updated'); } }; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __("Update Password") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{
                __(
                    "Ensure your account is using a long, random password to stay secure."
                )
            }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <div>
            <x-input-label
                for="current_password"
                :value="__('Current Password')"
            />
            <x-text-input
                wire:model="current_password"
                id="current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="current-password"
            />
            <x-input-error
                :messages="$errors->get('current_password')"
                class="mt-2"
            />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input
                wire:model="password"
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label
                for="password_confirmation"
                :value="__('Confirm Password')"
            />
            <x-text-input
                wire:model="password_confirmation"
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />
            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button
                wire:target="updatePassword"
                class="mb-1.5 block w-full transform rounded-md bg-blue-800 px-2 py-1.5 text-center text-white transition duration-200 ease-in hover:-translate-y-1 hover:border-transparent hover:bg-gray-600 hover:text-white active:translate-y-0 dark:bg-gray-500 dark:text-gray-900"
            >
                <span wire:loading.remove>
                    {{ __("Update") }}
                </span>
                <span wire:loading>
                    <svg
                        width="20px"
                        height="20px"
                        viewBox="0 0 16 16"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        class="animate-spin"
                        class="hds-flight-icon--animation-loading"
                    >
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g
                            id="SVGRepo_tracerCarrier"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        ></g>
                        <g id="SVGRepo_iconCarrier">
                            <g
                                fill="#000000"
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                            >
                                <path
                                    d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8z"
                                    opacity=".2"
                                ></path>
                                <path
                                    d="M7.25.75A.75.75 0 018 0a8 8 0 018 8 .75.75 0 01-1.5 0A6.5 6.5 0 008 1.5a.75.75 0 01-.75-.75z"
                                ></path>
                            </g>
                        </g>
                    </svg>
                </span>
            </x-primary-button>
            <x-action-message class="me-3" on="updatePassword">
                {{ __("Updated.") }}
            </x-action-message>
        </div>
    </form>
</section>
