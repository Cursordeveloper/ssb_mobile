<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\PersonalSusu\Payment\PersonalSusuPaymentApprovalController;
use App\Http\Controllers\V1\Susu\PersonalSusu\Payment\PersonalSusuPaymentController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/personal-susus', 'as' => 'customers.susus.personal-susus.', 'middleware' => 'auth:customer'], function (): void {
    // PersonalSusu payment
    Route::post(uri: '{susu}/payments', action: PersonalSusuPaymentController::class)
        ->name(name: 'payments.store');

    // PersonalSusu payment approval
    Route::post(uri: '{susu}/payments/{payment}/approvals', action: PersonalSusuPaymentApprovalController::class)
        ->name(name: 'payments.update');
});
