<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\FlexySusu\Payment\FlexySusuPaymentApprovalController;
use App\Http\Controllers\V1\Susu\FlexySusu\Payment\FlexySusuPaymentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/flexy-susus', 'as' => 'customers.susus.flexy-susus.', 'middleware' => 'auth:customer'], function (): void {
    // FlexySusu payment
    Route::post(uri: '{susu}/payments', action: FlexySusuPaymentController::class)
        ->name(name: 'payments.store');

    // FlexySusu payment approval
    Route::post(uri: '{susu}/payments/{payment}/approvals', action: FlexySusuPaymentApprovalController::class)
        ->name(name: 'payments.update');
});
