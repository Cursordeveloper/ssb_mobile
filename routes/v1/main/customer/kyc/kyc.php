<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\Kyc\KycApprovalController;
use App\Http\Controllers\V1\Customer\Kyc\KycCancellationController;
use App\Http\Controllers\V1\Customer\Kyc\KycController;
use App\Http\Controllers\V1\Customer\Kyc\KycVerificationConfirmationController;
use App\Http\Controllers\V1\Customer\Kyc\KycVerificationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers', 'as' => 'customers.'], function (): void {
    // Verify kyc id route
    Route::post(uri: 'kycs/verifications', action: KycVerificationController::class)
        ->name(name: 'kycs.verifications')
        ->middleware(middleware: 'auth:customer');

    // Cancel kyc route
    Route::post(uri: 'kycs/{kyc}/cancellations', action: KycCancellationController::class)
        ->name(name: 'kycs.cancellations')
        ->middleware(middleware: 'auth:customer');

    // Approve kyc id route
    Route::post(uri: 'kycs/{kyc}/approvals', action: KycApprovalController::class)
        ->name(name: 'kycs.approvals')
        ->middleware(middleware: 'auth:customer');

    // Get kycs route
    Route::get(uri: 'kycs', action: KycController::class)
        ->name(name: 'kycs.index')
        ->middleware(middleware: 'auth:customer');

    // Kyc id verification confirmation route
    Route::put(uri: '{customer}/kycs/verifications/confirmations', action: KycVerificationConfirmationController::class)
        ->name(name: 'kycs.verifications.confirmations');
});
