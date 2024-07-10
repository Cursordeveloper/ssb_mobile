<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\BizSusu\Payment\BizSusuPaymentAmountController;
use App\Http\Controllers\V1\Susu\BizSusu\Payment\BizSusuPaymentApprovalController;
use App\Http\Controllers\V1\Susu\BizSusu\Payment\BizSusuPaymentCancellationController;
use App\Http\Controllers\V1\Susu\BizSusu\Payment\BizSusuPaymentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/biz-susus', 'as' => 'customers.susus.biz-susus.', 'middleware' => 'auth:customer'], function (): void {
    // BizSusu payment route
    Route::post(uri: '{susu}/payments', action: BizSusuPaymentController::class)
        ->name(name: 'payments.store');

    // BizSusu payment amount route
    Route::post(uri: '{susu}/payments/amounts', action: BizSusuPaymentAmountController::class)
        ->name(name: 'payments.amounts.store');

    // BizSusu payment cancellations route
    Route::post(uri: '{susu}/payments/{payment}/cancellations', action: BizSusuPaymentCancellationController::class)
        ->name(name: 'payments.cancellations.update');

    // BizSusu payment approval route
    Route::post(uri: '{susu}/payments/{payment}/approvals', action: BizSusuPaymentApprovalController::class)
        ->name(name: 'payments.update');
});
