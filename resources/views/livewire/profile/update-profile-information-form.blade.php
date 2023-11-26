<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

new class extends Component {
    public string $firstname = '';
    public string $middlename = '';
    public string $lastname = '';
    public string $email = '';
    public string $section = '';
    public string $birthday = 'dd/mm/yyyy';
    public string $contact = '';
    public string $address = '';
    public string $province = '';
    public string $city = '';
    public string $barangay = '';
    public string $zip = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->firstname = Auth::user()->firstname;
        $this->middlename = Auth::user()->middlename;
        $this->lastname = Auth::user()->lastname;
        $this->email = Auth::user()->email;
        $this->section = Auth::user()->section;
        $this->birthday = Auth::user()->birthday;
        $this->contact = Auth::user()->contact;
        $this->address = Auth::user()->address;
        $this->province = Auth::user()->province;
        $this->city = Auth::user()->city;
        $this->barangay = Auth::user()->barangay;
        $this->zip = Auth::user()->zip;
    }

    /** * Update the profile information for the currently authenticated user. */
     public function updateProfileInformation(): void
     {
        $user = Auth::user();
        $validated = $this->validate(['firstname' => ['required', 'string', 'max:255'], 'middlename' => ['nullable', 'string', 'max:255'], 'lastname' => ['required', 'string', 'max:255'], 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],  'section' => ['required', 'string', 'max:255'], 'birthday' => ['nullable', 'date'], 'contact' => ['required','string', 'max:11'], 'address' => ['required','string','max:255'], 'province' => ['required','string','max:255'], 'city' => ['required','string','max:255'], 'barangay' => ['required','string','max:255'], 'zip' => ['required','string']]);
        $user->fill($validated);
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        $user->save();
        $this->dispatch('profile-updated', firstname: $user->firstname, middlename: $user->middlename, lastname: $user->lastname, section: $user->section, birthday: $user->birthday, contact: $user->contact, address: $user->address, province: $user->province, city: $user->city, barangay: $user->barangay, zip: $user->zip);

    }

    /** * Send an email verification notification to the current user. */
    public function sendVerification(): void
    {
        $user = Auth::user();
        if ($user->hasVerifiedEmail()) {
            $path = session('url.intended', RouteServiceProvider::HOME);
            $this->redirect($path);
            return;
        }
        $user->sendEmailVerificationNotification();
        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<div class="w-full rounded-lg bg-blue-600/70 px-6 md:px-10 dark:bg-blue-950/70">
    <div class="font-bold text-black">
        <div class="flex flex-row align-center items-center justify-center w-full md:p-4 text-xl">
            <div class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md underline text-white">
                <a>User Information</a>
            </div>

            <div class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md text-white">
                <a wire:navigate href="/change-profile">Change Picture</a>
            </div>

            <div class="mr-2 mb-4 hover:bg-gray-500/30 rounded-md text-white">
                <a wire:navigate href="/change-password">Change Password</a>
            </div>
        </div>
        <div class="mt-6 p-4">
            <div class="text-2xl text-blue-900">
                <p>Personal Information</p>
            </div>
        </div>
        <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
            <div>
                <div class="flex flex-col lg:flex-row p-4">
                    <div class="mr-2">
                        <div>
                            <x-input-label for="lastname" :value="__('Last name')" />
                            <x-text-input wire:model="lastname" id="lastname" name="lastname" type="text"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="lastname" />
                            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                        </div>
                    </div>

                    <div class="mr-2">
                        <div>
                            <x-input-label for="firstname" :value="__('First name')" />
                            <x-text-input wire:model="firstname" id="firstname" name="firstname" type="text"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="firstname" />
                            <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
                        </div>
                    </div>

                    <div class="mr-2">
                        <div>
                            <x-input-label for="middlename" :value="__('Middle name(optional)')" />
                            <x-text-input wire:model="middlename" id="middlename" name="middlename" type="text"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="middlename" />
                            <x-input-error class="mt-2" :messages="$errors->get('middlename')" />
                        </div>
                    </div>

                    <div class="mr-2">
                        <div>
                            <x-input-label for="section" :value="__('Year and Section')" />
                            <x-text-input wire:model="section" id="section" name="section" type="text"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="section" />
                            <x-input-error class="mt-2" :messages="$errors->get('section')" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row p-4">
                    <div class="mr-2">
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input wire:model="email" id="email" name="email" type="email"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="email" readonly />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                    </div>

                    <div class="mr-2">
                        <div>
                            <x-input-label for="birthday" :value="__('Birthday')" />
                            <x-text-input wire:model="birthday" id="birthday" name="birthday" type="date"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="birthday" />
                            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
                        </div>
                    </div>
                    <div class="mr-2">
                        <div>
                            <x-input-label for="contact" :value="__('Contact Number')" />
                            <x-text-input wire:model="contact" id="contact" name="contact" type="text"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="contact" />
                            <x-input-error class="mt-2" :messages="$errors->get('contact')" />
                        </div>
                    </div>

                    <div class="mr-2">
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input wire:model="address" id="address" name="address" type="text"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="address" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row p-4">
                    <div class="mr-2">
                        <div>
                            <x-input-label for="province" :value="__('Province')" />
                            <x-text-input wire:model="province" id="province" name="province" type="text"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="province" />
                            <x-input-error class="mt-2" :messages="$errors->get('province')" />
                        </div>
                    </div>

                    <div class="mr-2">
                        <div>
                            <x-input-label for="city" :value="__('City/Municipality')" />
                            <x-text-input wire:model="city" id="city" name="city" type="text"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="city" />
                            <x-input-error class="mt-2" :messages="$errors->get('city')" />
                        </div>
                    </div>

                    <div class="mr-2">
                        <div>
                            <x-input-label for="barangay" :value="__('Barangay')" />
                            <x-text-input wire:model="barangay" id="barangay" name="barangay" type="text"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="barangay" />
                            <x-input-error class="mt-2" :messages="$errors->get('barangay')" />
                        </div>
                    </div>

                    <div class="mr-2">
                        <div>
                            <x-input-label for="zip" :value="__('Zip Code')" />
                            <x-text-input wire:model="zip" id="zip" name="zip" type="text"
                                class="w-96 rounded-md border py-2 pl-10 pr-4 focus:border-blue-500 focus:outline-none"
                                autofocus autocomplete="zip" />
                            <x-input-error class="mt-2" :messages="$errors->get('zip')" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex p-2">
                <div class="mr-2 w-32 flex-row rounded text-center text-white">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    <button wire:navigate href="{{ route('home') }}"
                        class="block w-full transform rounded-md bg-blue-800 px-2 py-1.5 text-center text-white transition duration-200 ease-in hover:-translate-y-1 hover:border-transparent hover:bg-gray-600 hover:text-white active:translate-y-0 dark:bg-gray-500 dark:text-gray-900">
                        {{ __('Cancel') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
