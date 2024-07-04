<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\Kyc\KycApprovalController;
use App\Http\Controllers\V1\Customer\Kyc\KycCancellationController;
use App\Http\Controllers\V1\Customer\Kyc\KycController;
use App\Http\Controllers\V1\Customer\Kyc\KycVerificationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/kycs', 'as' => 'customers.kycs.', 'middleware' => 'auth:customer'], function (): void {
    // Verify kyc id route
    Route::post(uri: 'verifications', action: KycVerificationController::class)
        ->name(name: 'verifications');

    // Cancel kyc route
    Route::post(uri: '{kyc}/cancellations', action: KycCancellationController::class)
        ->name(name: 'cancellations');

    // Approve kyc id route
    Route::post(uri: '{kyc}/approvals', action: KycApprovalController::class)
        ->name(name: 'approvals');

    // Get kycs route
    Route::get(uri: '', action: KycController::class)
        ->name(name: 'index');
});
