<?php

use App\Http\Controllers\PaymentController;
use App\Livewire\Pages\Transactionhistory;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('livewire.landingpage');
})->name('landingpage');

Route::redirect('dashboard', 'home');

// Para email verification, dun sa ENV file pede niyo ilagay ang SMTP ng gmail or kahit anong SMTP provider 
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/termsandconditions&landing', function () {
    return view('livewire.pages.auth.tap.termsandconditions_landing');
})->name('tac&landing');

Route::get('/privacypolicy&landing', function () {
    return view('livewire.pages.auth.tap.privacypolicy_landing');
})->name('pp&landing');

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('livewire.pages.home');
    })->name('home');
    Route::get('/aboutus', function () {
        return view('livewire.pages.aboutus');
    })->name('aboutus');
    Route::get('/chatbot', function () {
        return view('livewire.pages.chatbot');
    })->name('chatbot');
    Route::get('/request', function () {
        return view('livewire.pages.request');
    })->name('request');
    Route::get('/transactionhistory', Transactionhistory::class)->name('transactionhistory');
    Route::get('/termsandconditions', function () {
        return view('livewire.pages.termsandconditions');
    })->name('termsandconditions');
    Route::get('/privacypolicy', function () {
        return view('livewire.pages.privacypolicy');
    })->name('privacypolicy');
    Route::get('/profile', function () {
        return view('livewire.pages.profile');
    })->name('profile');
    Route::get('/edit-profile', function () {
        return view('livewire.pages.edit-profile');
    })->name('edit-profile');
    Route::get('/change-profile', function () {
        return view('livewire.pages.change-profile');
    })->name('change-profile');
    Route::get('/change-password', function () {
        return view('livewire.pages.change-password');
    })->name('change-word');
    //payMongo --pending--
    Route::get('pay', [PaymentController::class, 'pay']);
    Route::get('success', [PaymentController::class, 'success']);
});

// 404 error handler
Route::fallback(function () {
    return view('errorhandler');
})->name('404');
