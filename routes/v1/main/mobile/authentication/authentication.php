<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Mobile\Authentication\LoginController;
use App\Http\Controllers\V1\Mobile\Authentication\LogoutController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/authentications', 'as' => 'customers.authentication.'], function (): void {
    // Unprotected routes
    Route::post(uri: 'logins', action: LoginController::class)
        ->name(name: 'logins');

    // Protected routes
    Route::post(uri: 'logouts', action: LogoutController::class)
        ->name(name: 'logouts')
        ->middleware(middleware: 'auth:customer');
});
