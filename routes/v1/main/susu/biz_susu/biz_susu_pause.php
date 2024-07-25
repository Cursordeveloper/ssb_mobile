<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\BizSusu\AccountPause\BizSusuAccountPauseApprovalController;
use App\Http\Controllers\V1\Susu\BizSusu\AccountPause\BizSusuAccountPauseCancellationController;
use App\Http\Controllers\V1\Susu\BizSusu\AccountPause\BizSusuAccountPauseController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/biz-susus', 'as' => 'customers.susus.biz-susus.', 'middleware' => 'auth:customer'], function (): void {
    // BizSusu collection pause route
    Route::post(uri: '{susu}/collections/pauses', action: BizSusuAccountPauseController::class)
        ->name(name: 'collections.pauses');

    // BizSusu collection cancellations route
    Route::post(uri: '{susu}/collections/{account_pause}/cancellations', action: BizSusuAccountPauseCancellationController::class)
        ->name(name: 'collections.cancellations');

    // BizSusu collection approvals route
    Route::post(uri: '{susu}/collections/{account_pause}/approvals', action: BizSusuAccountPauseApprovalController::class)
        ->name(name: 'collections.approvals');
});
