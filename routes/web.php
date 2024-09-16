<?php

use App\Http\Controllers\LoginController;
use App\Http\Livewire\BookingSection;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\PaymentMethod;
use App\Http\Livewire\RecheckBooking;
use App\Http\Livewire\RegistrationPage;
use Illuminate\Support\Facades\Route;

Route::get('/', RegistrationPage::class)->name('registrationroute');

Route::post("/logout", [LoginController::class, "logout"])->name("logout");

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

});

Route::group([
    'middleware' => ['auth:sanctum', 'verified', 'canbook'],
], function () {

    Route::get('/appointment', BookingSection::class)->name('bookingform');
    Route::get('/checkdata', RecheckBooking::class)
        ->name('checkappointment');
    Route::get('/paymethod', PaymentMethod::class)->name('paymethod');

});

// Get logged in user's role
// Create RoleRegistrar middleware
// Create RoleUser Middleware
// Make the booking form work

// Validate form
// Autocomplete age, sex based on name
// Validate doctor's date, time and Hall

// Show data to recheck
// Keep edit options
// Submit form data on click submit button

// Show booked student's information
// Check Doctor's available hour/ time
//
