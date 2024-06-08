<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Susu\SusuBalanceController;
use App\Http\Controllers\V1\Susu\Susu\SusuCloseController;
use App\Http\Controllers\V1\Susu\Susu\SusuPauseController;
use App\Http\Controllers\V1\Susu\Susu\SususController;
use App\Http\Controllers\V1\Susu\Susu\SusuTransactionsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus', 'as' => 'customers.susus.', 'middleware' => 'auth:customer'], function (): void {
    // SususController route
    Route::get(uri: '', action: SususController::class)
        ->name(name: 'index');

    // SusuBalanceController route
    Route::post(uri: '{susu}/balances', action: SusuBalanceController::class)
        ->name(name: 'balances');

    // SusuPauseController route
    Route::post(uri: '{susu}/pause', action: SusuPauseController::class)
        ->name(name: 'pause');

    // SusuCloseController route
    Route::post(uri: '{susu}/close', action: SusuCloseController::class)
        ->name(name: 'close');

    // SusuTransactionsController route
    Route::get(uri: '{susu}/transactions', action: SusuTransactionsController::class)
        ->name(name: 'transactions');
});
