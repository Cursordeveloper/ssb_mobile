<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Mobile\Password\PasswordResetController;
use App\Http\Controllers\V1\Mobile\Password\PasswordResetRequestController;
use App\Http\Controllers\V1\Mobile\Password\PasswordResetTokenVerificationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers', 'as' => 'customers.'], function (): void {
    // Password reset request route
    Route::post(
        uri: 'passwords/resets/requests',
        action: PasswordResetRequestController::class,
    )->name(
        name: 'passwords.resets.requests'
    );

    // Password reset token validation route
    Route::post(
        uri: '{customer}/passwords/resets/tokens/verifications',
        action: PasswordResetTokenVerificationController::class,
    )->name(
        name: 'passwords.tokens.verifications'
    );

    // Password reset route
    Route::post(
        uri: '{customer}/passwords/resets',
        action: PasswordResetController::class,
    )->name(
        name: 'passwords.resets'
    );
});
