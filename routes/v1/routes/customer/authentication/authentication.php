<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\Authentication\LoginController;
use App\Http\Controllers\V1\Customer\Authentication\LogoutController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customers/authentication',
    'as' => 'customers.authentication.',
], function (): void {
    // Unprotected routes
    Route::group([], function (): void {
        Route::post(
            uri: 'login',
            action: LoginController::class,
        )->name(
            name: 'login'
        );
    });

    // Protected routes
    Route::group([
        'middleware' => 'auth:customer',
    ], function (): void {
        Route::post(
            uri: 'logout',
            action: LogoutController::class,
        )->name(
            name: 'logout'
        );
    });
});
