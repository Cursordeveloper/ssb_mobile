<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Mobile\Registration\RegistrationActivationController;
use App\Http\Controllers\V1\Mobile\Registration\RegistrationController;
use App\Http\Controllers\V1\Mobile\Registration\RegistrationTokenController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'registration', 'as' => 'registration.'], function (): void {
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
