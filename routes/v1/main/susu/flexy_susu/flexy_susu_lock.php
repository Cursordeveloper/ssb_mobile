<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\FlexySusu\Lock\FlexySusuAccountLockApprovalController;
use App\Http\Controllers\V1\Susu\FlexySusu\Lock\FlexySusuAccountLockCancellationController;
use App\Http\Controllers\V1\Susu\FlexySusu\Lock\FlexySusuAccountLockController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/flexy-susus', 'as' => 'customers.susus.flexy-susus.', 'middleware' => 'auth:customer'], function (): void {
    // FlexySusu account lock route
    Route::post(uri: '{susu}/account-locks', action: FlexySusuAccountLockController::class)
        ->name(name: 'account-locks.store');

    // FlexySusu account lock cancellations
    Route::post(uri: '{susu}/account-locks/{account_lock}/cancellations', action: FlexySusuAccountLockCancellationController::class)
        ->name(name: 'account-locks.cancellations.delete');

    // FlexySusu account lock approval
    Route::post(uri: '{susu}/account-locks/{account_lock}/approvals', action: FlexySusuAccountLockApprovalController::class)
        ->name(name: 'account-locks.approvals.update');
});
