<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\GoalGetterSusu\Withdrawal\GoalGetterSusuWithdrawalApprovalController;
use App\Http\Controllers\V1\Susu\GoalGetterSusu\Withdrawal\GoalGetterSusuWithdrawalController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/goal-getter-susus', 'as' => 'customers.susus.goal-getter-susus.', 'middleware' => 'auth:customer'], function (): void {
    // GoalGetterSusu withdrawal
    Route::post(uri: '{susu}/withdrawals', action: GoalGetterSusuWithdrawalController::class)
        ->name(name: 'withdrawals.store');

    // GoalGetterSusu withdrawal approval
    Route::post(uri: '{susu}/withdrawals/{withdrawal}/approvals', action: GoalGetterSusuWithdrawalApprovalController::class)
        ->name(name: 'withdrawals.update');
});
