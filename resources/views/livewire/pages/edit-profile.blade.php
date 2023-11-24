<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $firstname = '';
    public string $middlename = '';
    public string $lastname = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->firstname = Auth::user()->firstname; $this->middlename =
Auth::user()->middlename; $this->lastname = Auth::user()->lastname; $this->email
= Auth::user()->email; } /** * Update the profile information for the currently
authenticated user. */ public function updateProfileInformation(): void { $user
= Auth::user(); $validated = $this->validate(['firstname' => ['required',
'string', 'max:255'], 'middlename' => ['nullable', 'string', 'max:255'],
'lastname' => ['required', 'string', 'max:255'], 'email' => ['required',
'string', 'lowercase', 'email', 'max:255',
Rule::unique(User::class)->ignore($user->id)]]); $user->fill($validated); if
($user->isDirty('email')) { $user->email_verified_at = null; } $user->save();
$this->dispatch('profile-updated', firstname: $user->firstname, middlename:
$user->middlename, lastname: $user->lastname); } /** * Send an email
verification notification to the current user. */ public function
sendVerification(): void { $user = Auth::user(); if ($user->hasVerifiedEmail())
{ $path = session('url.intended', RouteServiceProvider::HOME);
$this->redirect($path); return; } $user->sendEmailVerificationNotification();
Session::flash('status', 'verification-link-sent'); } }; ?>
<x-app-layout>
    <!-- Need muna lagyan ng table sa database at make sure fillable siya sa user.php -->
    <livewire:profile.update-profile-information-form />
</x-app-layout>
