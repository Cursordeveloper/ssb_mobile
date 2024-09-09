<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\Pin\PinChangeController;
use App\Http\Controllers\V1\Customer\Pin\PinCreateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers', 'as' => 'customers.'], function (): void {
    // Unprotected routes
    Route::group([], function (): void {
        Route::post(uri: '{customer}/pins', action: PinCreateController::class)
            ->name(name: 'pins');
    });

    // Protected routes
    Route::group(['middleware' => 'auth:customer'], function (): void {
        Route::post(uri: 'pins/change', action: PinChangeController::class)
            ->name(name: 'pins.change');
    });
});
