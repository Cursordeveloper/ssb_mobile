<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\FlexySusu\AccountLock\FlexySusuAccountLockController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/flexy-susus', 'as' => 'customers.susus.flexy-susus.', 'middleware' => 'auth:customer'], function (): void {
    // FlexySusu account lock route
    Route::post(uri: '{susu}/account-locks', action: FlexySusuAccountLockController::class)
        ->name(name: 'account-locks.store');
});
