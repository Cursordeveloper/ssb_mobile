<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\GoalGetterSusu\Payment\GoalGetterSusuPaymentApprovalController;
use App\Http\Controllers\V1\Susu\GoalGetterSusu\Payment\GoalGetterSusuPaymentCancellationController;
use App\Http\Controllers\V1\Susu\GoalGetterSusu\Payment\GoalGetterSusuPaymentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/goal-getter-susus', 'as' => 'customers.susus.goal-getter-susus.', 'middleware' => 'auth:customer'], function (): void {
    // GoalGetterSusu payment route
    Route::post(uri: '{susu}/payments', action: GoalGetterSusuPaymentController::class)
        ->name(name: 'payments.store');

    // GoalGetterSusu payment cancellations route
    Route::post(uri: '{susu}/payments/{payment}/cancellations', action: GoalGetterSusuPaymentCancellationController::class)
        ->name(name: 'payments.cancellations.update');

    // GoalGetterSusu payment approval
    Route::post(uri: '{susu}/payments/{payment}/approvals', action: GoalGetterSusuPaymentApprovalController::class)
        ->name(name: 'payments.update');
});
