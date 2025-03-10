<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\FlexySusu\Payment\FlexySusuPaymentApprovalController;
use App\Http\Controllers\V1\Susu\FlexySusu\Payment\FlexySusuPaymentCancellationController;
use App\Http\Controllers\V1\Susu\FlexySusu\Payment\FlexySusuPaymentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/flexy-susus', 'as' => 'customers.susus.flexy-susus.', 'middleware' => 'auth:customer'], function (): void {
    // FlexySusu payment route
    Route::post(uri: '{susu}/payments', action: FlexySusuPaymentController::class)
        ->name(name: 'payments.store');

    // FlexySusu payment cancellations route
    Route::post(uri: '{susu}/payments/{payment}/cancellations', action: FlexySusuPaymentCancellationController::class)
        ->name(name: 'payments.cancellations.update');

    // FlexySusu payment approval route
    Route::post(uri: '{susu}/payments/{payment}/approvals', action: FlexySusuPaymentApprovalController::class)
        ->name(name: 'payments.update');
});
