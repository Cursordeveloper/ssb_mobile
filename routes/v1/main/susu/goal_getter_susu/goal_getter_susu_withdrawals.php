<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\GoalGetterSusu\Withdrawal\GoalGetterSusuFullWithdrawalController;
use App\Http\Controllers\V1\Susu\GoalGetterSusu\Withdrawal\GoalGetterSusuWithdrawalApprovalController;
use App\Http\Controllers\V1\Susu\GoalGetterSusu\Withdrawal\GoalGetterSusuWithdrawalCancellationController;
use App\Http\Controllers\V1\Susu\GoalGetterSusu\Withdrawal\GoalGetterSusuWithdrawalController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/goal-getter-susus', 'as' => 'customers.susus.goal-getter-susus.', 'middleware' => 'auth:customer'], function (): void {
    // GoalGetterSusu withdrawal route
    Route::post(uri: '{susu}/withdrawals', action: GoalGetterSusuWithdrawalController::class)
        ->name(name: 'withdrawals.store');

    // GoalGetterSusu full withdrawal route
    Route::post(uri: '{susu}/full/withdrawals', action: GoalGetterSusuFullWithdrawalController::class)
        ->name(name: 'full.withdrawals.store');

    // GoalGetterSusu withdrawal cancellations route
    Route::post(uri: '{susu}/withdrawals/{withdrawal}/cancellations', action: GoalGetterSusuWithdrawalCancellationController::class)
        ->name(name: 'withdrawals.cancellations.update');

    // GoalGetterSusu withdrawal approval route
    Route::post(uri: '{susu}/withdrawals/{withdrawal}/approvals', action: GoalGetterSusuWithdrawalApprovalController::class)
        ->name(name: 'withdrawals.update');
});
