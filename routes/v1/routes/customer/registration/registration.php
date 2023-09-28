<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\Registration\RegistrationActivationController;
use App\Http\Controllers\V1\Customer\Registration\RegistrationController;
use App\Http\Controllers\V1\Customer\Registration\RegistrationTokenController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customers/registration',
    'as' => 'customers.registration.',
], function (): void {
    // Unprotected routes
    Route::group([], function (): void {
        Route::post(
            uri: '',
            action: RegistrationController::class
        )->name(
            name: '',
        );
        Route::post(
            uri: 'token',
            action: RegistrationTokenController::class
        )->name(
            name: 'token',
        );
        Route::post(
            uri: 'activation',
            action: RegistrationActivationController::class
        )->name(
            name: 'activation',
        );
    });

    // Protected routes
    Route::group([
        'middleware' => 'auth:user',
    ], function (): void {
    });
});
