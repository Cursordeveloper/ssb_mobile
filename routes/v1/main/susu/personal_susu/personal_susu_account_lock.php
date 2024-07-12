<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\PersonalSusu\AccountLock\PersonalSusuAccountLockController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/personal-susus', 'as' => 'customers.susus.personal-susus.', 'middleware' => 'auth:customer'], function (): void {
    // PersonalSusu account lock route
    Route::post(uri: '{susu}/account-locks', action: PersonalSusuAccountLockController::class)
        ->name(name: 'account-locks.store');
});
