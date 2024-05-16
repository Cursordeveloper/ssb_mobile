<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\Registration\CustomerCreatedController;
use App\Http\Controllers\V1\Customer\Registration\CustomerHasPinUpdateController;
use App\Http\Controllers\V1\Mobile\Registration\RegistrationNewTokenController;
use App\Http\Controllers\V1\Mobile\Registration\RegistrationPasswordCreationController;
use App\Http\Controllers\V1\Mobile\Registration\RegistrationPersonalInformationController;
use App\Http\Controllers\V1\Mobile\Registration\RegistrationTokenVerificationController;
use App\Http\Controllers\V1\Mobile\Registration\RegistrationVerificationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers', 'as' => 'customers.'], function (): void {
    // Registration (phone_number) verification route
    Route::post(
        uri: 'registrations/verifications',
        action: RegistrationVerificationController::class
    )->name(name: 'registrations.verifications');

    // Registration token (new) request route
    Route::post(
        uri: 'registrations/tokens',
        action: RegistrationNewTokenController::class
    )->name(name: 'registrations.tokens');

    // Registration token (new) verification route
    Route::post(
        uri: '{customer}/registrations/tokens/verifications',
        action: RegistrationTokenVerificationController::class
    )->name(name: 'registration.customers.tokens.verifications');

    // Registration personal information route
    Route::post(
        uri: '{customer}/registrations/personal-information',
        action: RegistrationPersonalInformationController::class
    )->name(name: 'registrations.personal-information.customer');

    // Password / Email registration route (Only when customer started registration from USSD)
    Route::post(
        uri: '{customer}/registrations/passwords',
        action: RegistrationPasswordCreationController::class
    )->name(name: 'registrations.passwords');

    // Create new customer from USSD or Web API route
    Route::post(
        uri: '',
        action: CustomerCreatedController::class
    )->name(name: 'store');

    // Update customer has_pin status route
    Route::put(
        uri: 'registrations/pins',
        action: CustomerHasPinUpdateController::class
    )->name(name: 'update');
});
