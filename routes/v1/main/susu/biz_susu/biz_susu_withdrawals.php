<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\BizSusu\Withdrawal\BizSusuFullWithdrawalController;
use App\Http\Controllers\V1\Susu\BizSusu\Withdrawal\BizSusuWithdrawalApprovalController;
use App\Http\Controllers\V1\Susu\BizSusu\Withdrawal\BizSusuWithdrawalCancellationController;
use App\Http\Controllers\V1\Susu\BizSusu\Withdrawal\BizSusuWithdrawalController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/biz-susus', 'as' => 'customers.susus.biz-susus.', 'middleware' => 'auth:customer'], function (): void {
    // BizSusu withdrawal route
    Route::post(uri: '{susu}/withdrawals', action: BizSusuWithdrawalController::class)
        ->name(name: 'withdrawals.store');

    // GoalGetterSusu full withdrawal route
    Route::post(uri: '{susu}/full/withdrawals', action: BizSusuFullWithdrawalController::class)
        ->name(name: 'full.withdrawals.store');

    // BizSusu withdrawal cancellations route
    Route::post(uri: '{susu}/withdrawals/{withdrawal}/cancellations', action: BizSusuWithdrawalCancellationController::class)
        ->name(name: 'withdrawals.cancellations.update');

    // BizSusu withdrawal approval route
    Route::post(uri: '{susu}/withdrawals/{withdrawal}/approvals', action: BizSusuWithdrawalApprovalController::class)
        ->name(name: 'withdrawals.approvals.update');
});
