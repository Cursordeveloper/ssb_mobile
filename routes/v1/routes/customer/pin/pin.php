<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\Pin\ChangePinController;
use App\Http\Controllers\V1\Customer\Pin\CreatePinController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'pin',
    'as' => 'pin.',
], function (): void {
    // Unprotected routes
    Route::group([], function (): void {
        Route::post(
            uri: '',
            action: CreatePinController::class,
        )->name(
            name: '',
        );
    });

    // Protected routes
    Route::group([
        'middleware' => 'auth:customer',
    ], function (): void {
        Route::post(
            uri: 'change',
            action: ChangePinController::class
        )->name(
            name: 'change'
        );
    });
});
