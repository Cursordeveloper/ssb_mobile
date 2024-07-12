<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\BizSusu\AccountLock\BizSusuAccountLockController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/biz-susus', 'as' => 'customers.susus.biz-susus.', 'middleware' => 'auth:customer'], function (): void {
    // BizSusu account lock route
    Route::post(uri: '{susu}/account-locks', action: BizSusuAccountLockController::class)
        ->name(name: 'account-locks.store');
});
