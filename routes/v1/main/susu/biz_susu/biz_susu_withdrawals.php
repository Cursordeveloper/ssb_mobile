<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\BizSusu\Withdrawal\BizSusuWithdrawalApprovalController;
use App\Http\Controllers\V1\Susu\BizSusu\Withdrawal\BizSusuWithdrawalController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/biz-susus', 'as' => 'customers.susus.biz-susus.', 'middleware' => 'auth:customer'], function (): void {
    // BizSusu withdrawal
    Route::post(uri: '{susu}/withdrawals', action: BizSusuWithdrawalController::class)
        ->name(name: 'withdrawals.store');

    // BizSusu withdrawal approval
    Route::post(uri: '{susu}/withdrawals/{withdrawal}/approvals', action: BizSusuWithdrawalApprovalController::class)
        ->name(name: 'withdrawals.update');
});
