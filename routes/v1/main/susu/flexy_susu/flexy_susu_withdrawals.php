<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\FlexySusu\Withdrawal\FlexySusuWithdrawalApprovalController;
use App\Http\Controllers\V1\Susu\FlexySusu\Withdrawal\FlexySusuWithdrawalCancellationController;
use App\Http\Controllers\V1\Susu\FlexySusu\Withdrawal\FlexySusuWithdrawalController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/flexy-susus', 'as' => 'customers.susus.flexy-susus.', 'middleware' => 'auth:customer'], function (): void {
    // Flexy withdrawal route
    Route::post(uri: '{susu}/withdrawals', action: FlexySusuWithdrawalController::class)
        ->name(name: 'withdrawals.store');

    // Flexy withdrawal cancellations route
    Route::post(uri: '{susu}/withdrawals/{withdrawal}/cancellations', action: FlexySusuWithdrawalCancellationController::class)
        ->name(name: 'withdrawals.cancellations.update');

    // Flexy withdrawal approval route
    Route::post(uri: '{susu}/withdrawals/{withdrawal}/approvals', action: FlexySusuWithdrawalApprovalController::class)
        ->name(name: 'withdrawals.approvals.update');
});
