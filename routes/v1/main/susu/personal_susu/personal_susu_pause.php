<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\PersonalSusu\AccountPause\PersonalSusuAccountPauseApprovalController;
use App\Http\Controllers\V1\Susu\PersonalSusu\AccountPause\PersonalSusuAccountPauseCancellationController;
use App\Http\Controllers\V1\Susu\PersonalSusu\AccountPause\PersonalSusuAccountPauseController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/personal-susus', 'as' => 'customers.susus.personal-susus.', 'middleware' => 'auth:customer'], function (): void {
    // PersonalSusu collection pause route
    Route::post(uri: '{susu}/collections/pauses', action: PersonalSusuAccountPauseController::class)
        ->name(name: 'collections.pauses');

    // PersonalSusu collection cancellations route
    Route::post(uri: '{susu}/collections/{account_pause}/cancellations', action: PersonalSusuAccountPauseCancellationController::class)
        ->name(name: 'collections.cancellations');

    // PersonalSusu collection approvals route
    Route::post(uri: '{susu}/collections/{account_pause}/approvals', action: PersonalSusuAccountPauseApprovalController::class)
        ->name(name: 'collections.approvals');
});
