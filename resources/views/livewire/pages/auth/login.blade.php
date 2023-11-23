<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();
        $this->form->authenticate();
        Session::regenerate();
        $this->redirect(session('url.intended', RouteServiceProvider::HOME), navigate: true);
    }
}; ?>

<x-popup name="Login">
    <div class="flex w-full flex-wrap content-center justify-center">
        <!-- Login component -->
        <div class="flex shadow-md">
            <!-- Login form -->
            <div
                class="flex h-[32rem] w-[24rem] flex-wrap content-center justify-center rounded-l-md bg-white dark:bg-gray-700">
                <div class="w-72">
                    <!-- Heading -->
                    <h1 class="text-xl font-semibold dark:text-gray-800">Login to continue</h1>
                    <h2 class="text-gray-400 dark:text-black">Welcome to DHVSU CSS Help Desk</h2>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <!-- Form -->
                    <form wire:submit="login" class="mt-4">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <div class="mb-3">

                            <input wire:model='form.email' name="email" type="email" placeholder="Enter your email"
                                class="block w-full rounded-md border border-gray-300 px-1.5 py-1 text-gray-500 focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 dark:border-gray-700 dark:bg-gray-800" />
                        </div>

                        <div class="mb-3">

                            <input wire:model='form.password' name="password" type="password"
                                placeholder="Enter your password"
                                class="block w-full rounded-md border border-gray-300 px-1.5 py-1 text-gray-500 focus:border-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-900 dark:border-gray-700 dark:bg-gray-800" />
                        </div>

                        <div class="mb-3 flex flex-wrap content-center">
                            <!-- Remember Me -->
                            <input
                                wire:model="form.remember"
                                id="remember"
                                type="checkbox"
                                class="mr-1 checked:bg-purple-700"
                            />
                            <label
                            for="remember"
                            class="mr-auto text-xs font-semibold dark:text-gray-900"
                            >{{ __('Remember me') }}</label
                        >
                            @if (Route::has('password.request'))
                                <a class="text-xs font-semibold text-gray-700 dark:text-gray-900"
                                    href="{{ route('password.request') }}" wire:navigate>
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                            <div class="mb-3">
                                <button type="submit"
                                wire:loading.attr="disabled"
                                wire:target="register"
                                class="mb-1.5 block w-full text-center text-white bg-blue-800 dark:bg-gray-500 hover:bg-gray-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0 px-2 py-1.5 rounded-md dark:text-gray-900"
                            >
                            <span
                            wire:loading.remove
                            
                        >
                            {{ __("Login") }}
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
                            </button>
                        </div>
                    </form>

                    <!-- Footer -->
                    <div class="text-center">
                        <span class="text-xs font-semibold text-gray-400">Don't have an account?</span>
                        <a x-data @click="$dispatch('open-modal',{name:'Register'})"
                            class="transform cursor-pointer rounded text-xs font-semibold text-blue-700 transition duration-200 ease-in hover:-translate-y-1 hover:border-transparent hover:bg-gray-600 hover:text-white active:translate-y-0 dark:text-gray-900">Sign
                            up
                        </a>
                    </div>
                </div>
            </div>

            <!-- Login banner -->
            <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem">
                <img class="h-full w-full rounded-r-md bg-cover bg-center bg-no-repeat"
                    src="{{ asset('assets/imgs/login-bg-dark.png') }}" />

            </div>
        </div>
</x-popup>
<!-- ------------------------------------------------------- -->
