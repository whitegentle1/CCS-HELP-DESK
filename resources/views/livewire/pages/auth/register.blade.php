<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

new #[Layout('layouts.guest')] class extends Component {
    public $courses = ['BS Computer Science', 'BS Information Technology', 'BS Information Systems', 'Associate in Computer Technology'];

    public string $course = 'BS Computer Science';
    public string $firstname = '';
    public string $middlename = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $acceptTerms = false;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate( [ 'course' => ['required', 'string',
'max:255'], 'firstname' => ['required', 'string', 'max:255'], 'middlename' =>
['nullable', 'string', 'max:255'], 'lastname' => ['required', 'string',
'max:255'], 'email' => [ 'required', 'string', 'email', 'max:255',
'unique:users', function ($attribute, $value, $fail) { if
(!str_ends_with($value, '@dhvsu.edu.ph')) { $fail( 'The ' . $attribute . ' must
be a valid @dhvsu.edu.ph email address.', ); } }, ], 'password' => ['required',
'min:8', 'confirmed',
'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]+$/'], 'acceptTerms' =>
['required', 'accepted'], ], [ 'password.regex' => 'The password must be at
least 8 characters long, contain at least one uppercase letter, and have at
least one special character (!@#$%^&*).', 'acceptTerms.accepted' => 'You must
accept the Terms of Service and Privacy Policy before signing up.', ], );
$validated['password'] = Hash::make($validated['password']); event(new
Registered(($user = User::create($validated)))); $dt =
Carbon::now('Asia/Manila'); $todayDate = $dt->toDayDateTimeString(); $email =
$this->email; $log_history = ['email' => $email, 'activity' => 'Registered',
'ip_address' => request()->ip(), 'user_agent' => request()->userAgent(),
'login_time' => $todayDate]; DB::table('login_history')->insert($log_history);
Auth::login($user); $this->redirect(RouteServiceProvider::HOME, navigate: true);
} }; ?>
<x-popup name="Register">
    <div class="flex w-full flex-wrap content-center justify-center">
        <!-- Register component -->
        <div class="flex shadow-md">
            <!-- Register banner -->
            <div
                class="flex flex-wrap content-center justify-center rounded-l-md"
                style="width: 24rem"
            >
                <img
                    class="h-full w-full rounded-l-md bg-cover bg-center bg-no-repeat"
                    src="{{ asset('assets/imgs/reg-dark.png') }}"
                />
            </div>
            <!-- Register form -->
            <div
                class="flex flex-wrap content-center justify-center rounded-r-md bg-white p-5 dark:bg-gray-700"
                style="width: 24rem"
            >
                <div class="w-72">
                    <!-- Heading -->
                    <h1
                        class="text-right text-xl font-semibold dark:text-gray-800"
                    >
                        Register your DHVSU account
                    </h1>
                    <h2 class="text-right text-gray-400 dark:text-black">
                        Fill up all the forms to continue
                    </h2>

                    <!-- Form -->
                    <form wire:submit="register" class="mt-4">
                        <x-input-error
                            :messages="$errors->get('course')"
                            class="mt-2"
                        />
                        <div class="mb-3">
                            <select
                                wire:model="course"
                                name="course"
                                class="block w-full rounded-md border border-gray-300 px-1.5 py-1 text-right text-sm text-gray-500 focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 dark:border-gray-700 dark:bg-gray-800"
                            >
                                @foreach ($courses as $courseOption)
                                <option value="{{ $courseOption }}">
                                    {{ $courseOption }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error
                            :messages="$errors->get('firstname')"
                            class="mt-2"
                        />
                        <div class="mb-3">
                            <input
                                wire:model="firstname"
                                name="firstname"
                                type="text"
                                placeholder="Enter your first name"
                                class="block w-full rounded-md border border-gray-300 px-1.5 py-1 text-right text-sm text-gray-500 focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 dark:border-gray-700 dark:bg-gray-800"
                            />
                        </div>
                        <div class="mb-3">
                            <input
                                wire:model="middlename"
                                name="middlename"
                                type="text"
                                placeholder="Enter your middle name(optional)"
                                class="block w-full rounded-md border border-gray-300 px-1.5 py-1 text-right text-sm text-gray-500 focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 dark:border-gray-700 dark:bg-gray-800"
                            />
                        </div>
                        <x-input-error
                            :messages="$errors->get('lastname')"
                            class="mt-2"
                        />
                        <div class="mb-3">
                            <input
                                wire:model="lastname"
                                name="lastname"
                                type="text"
                                placeholder="Enter your last name"
                                class="block w-full rounded-md border border-gray-300 px-1.5 py-1 text-right text-sm text-gray-500 focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 dark:border-gray-700 dark:bg-gray-800"
                            />
                        </div>
                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />
                        <div class="mb-3">
                            <input
                                wire:model="email"
                                name="email"
                                type="email"
                                placeholder="Enter your DVHSU email"
                                class="block w-full rounded-md border border-gray-300 px-1.5 py-1 text-right text-sm text-gray-500 focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 dark:border-gray-700 dark:bg-gray-800"
                            />
                        </div>
                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />
                        <div class="mb-3">
                            <input
                                wire:model="password"
                                name="password"
                                type="password"
                                placeholder="Password must be 8 characters or more"
                                class="block w-full rounded-md border border-gray-300 px-1.5 py-1 text-right text-sm text-gray-500 focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 dark:border-gray-700 dark:bg-gray-800"
                            />
                        </div>
                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2"
                        />
                        <div class="mb-3">
                            <input
                                wire:model="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                placeholder="Confirm your password"
                                class="block w-full rounded-md border border-gray-300 px-1.5 py-1 text-right text-sm text-gray-500 focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 dark:border-gray-700 dark:bg-gray-800"
                            />
                        </div>

                        <div class="mb-3">
                            <x-primary-button
                                wire:target="register"
                                class="mb-1.5 block w-full transform rounded-md bg-blue-800 px-2 py-1.5 text-center text-white transition duration-200 ease-in hover:-translate-y-1 hover:border-transparent hover:bg-gray-600 hover:text-white active:translate-y-0 dark:bg-gray-500 dark:text-gray-900"
                            >
                                <span wire:loading.remove>
                                    {{ __("Register") }}
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
                                        <g
                                            id="SVGRepo_bgCarrier"
                                            stroke-width="0"
                                        ></g>
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
                        </div>
                    </form>
                </div>
                <x-input-error
                    :messages="$errors->get('acceptTerms')"
                    class="mt-2"
                />
                <div class="mb-3 flex flex-wrap content-center">
                    <!-- Remember Me -->
                    <input
                        wire:model="acceptTerms"
                        id="termsandprivacy"
                        type="checkbox"
                        class="mr-1 checked:bg-gray-700"
                    />
                    <label
                        for="remember"
                        class="mr-auto text-xs font-semibold dark:text-gray-900"
                    >
                        {!! __( 'I agree to the :terms_of_service and
                        :privacy_policy', [ 'terms_of_service' => '<a
                            target="_blank"
                            href="/termsandconditions&landing"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            >' . __('Terms of Service') . '</a
                        >', 'privacy_policy' => '<a
                            target="_blank"
                            href="/privacypolicy&landing"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            >' . __('Privacy Policy') . '</a
                        >', ], ) !!}</label
                    >
                </div>

                <!-- Footer -->
                <div class="text-center">
                    <span class="text-xs font-semibold text-gray-400"
                        >Already have an account?</span
                    >
                    <a
                        x-data
                        @click="$dispatch('open-modal',{name:'Login'})"
                        class="transform cursor-pointer rounded text-xs font-semibold text-blue-700 transition duration-200 ease-in hover:-translate-y-1 hover:border-transparent hover:bg-gray-600 hover:text-white active:translate-y-0 dark:text-gray-900"
                        >Sign in
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-popup>
