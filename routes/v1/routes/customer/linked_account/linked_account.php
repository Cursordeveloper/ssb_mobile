<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\LinkedAccount\LinkAccountController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customers/linked-accounts',
    'as' => 'customers.linked-accounts.',
], function (): void {
    // Unprotected routes
    Route::group([], function (): void {
    });

    // Protected routes
    Route::group([
        'middleware' => 'auth:customer',
    ], function (): void {
        Route::post(
            uri: '',
            action: LinkAccountController::class
        )->name(
            name: 'store'
        );
    });
});
