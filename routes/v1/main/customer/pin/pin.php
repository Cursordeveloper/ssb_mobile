<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\Pin\PinChangeController;
use App\Http\Controllers\V1\Customer\Pin\PinCreateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers', 'as' => 'customers.'], function (): void {
    Route::post(uri: '{customer}/pins', action: PinCreateController::class)
        ->name(name: 'pins');

    Route::post(uri: 'pins/change', action: PinChangeController::class)
        ->name(name: 'pins.change')
        ->middleware(middleware: 'auth:customer');
});
