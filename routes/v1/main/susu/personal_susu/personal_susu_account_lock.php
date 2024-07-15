<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\PersonalSusu\AccountLock\PersonalSusuAccountLockApprovalController;
use App\Http\Controllers\V1\Susu\PersonalSusu\AccountLock\PersonalSusuAccountLockCancellationController;
use App\Http\Controllers\V1\Susu\PersonalSusu\AccountLock\PersonalSusuAccountLockController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/personal-susus', 'as' => 'customers.susus.personal-susus.', 'middleware' => 'auth:customer'], function (): void {
    // PersonalSusu account lock route
    Route::post(uri: '{susu}/account-locks', action: PersonalSusuAccountLockController::class)
        ->name(name: 'account-locks.store');

    // PersonalSusu account lock cancellations
    Route::post(uri: '{susu}/account-locks/{account_lock}/cancellations', action: PersonalSusuAccountLockCancellationController::class)
        ->name(name: 'account-locks.cancellations.delete');

    // PersonalSusu account lock approval
    Route::post(uri: '{susu}/account-locks/{account_lock}/approvals', action: PersonalSusuAccountLockApprovalController::class)
        ->name(name: 'account-locks.approvals.update');
});
