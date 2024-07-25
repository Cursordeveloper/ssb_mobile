<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\FlexySusu\AccountPause\FlexySusuAccountPauseApprovalController;
use App\Http\Controllers\V1\Susu\FlexySusu\AccountPause\FlexySusuAccountPauseCancellationController;
use App\Http\Controllers\V1\Susu\FlexySusu\AccountPause\FlexySusuAccountPauseController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/flexy-susus', 'as' => 'customers.susus.flexy-susus.', 'middleware' => 'auth:customer'], function (): void {
    // FlexySusu collection pause route
    Route::post(uri: '{susu}/collections/pauses', action: FlexySusuAccountPauseController::class)
        ->name(name: 'collections.pauses');

    // FlexySusu collection cancellations route
    Route::post(uri: '{susu}/collections/{account_pause}/cancellations', action: FlexySusuAccountPauseCancellationController::class)
        ->name(name: 'collections.cancellations');

    // FlexySusu collection approvals route
    Route::post(uri: '{susu}/collections/{account_pause}/approvals', action: FlexySusuAccountPauseApprovalController::class)
        ->name(name: 'collections.approvals');
});
