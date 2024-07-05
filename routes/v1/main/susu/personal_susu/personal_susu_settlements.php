<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\PersonalSusu\Settlement\PersonalSusuSettlementApprovalController;
use App\Http\Controllers\V1\Susu\PersonalSusu\Settlement\PersonalSusuSettlementCancellationController;
use App\Http\Controllers\V1\Susu\PersonalSusu\Settlement\PersonalSusuSettlementController;
use App\Http\Controllers\V1\Susu\PersonalSusu\Settlement\PersonalSusuSettlementPendController;
use App\Http\Controllers\V1\Susu\PersonalSusu\Settlement\PersonalSusuSettlementZeroOutController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/personal-susus', 'as' => 'customers.susus.personal-susus.', 'middleware' => 'auth:customer'], function (): void {
    // PersonalSusu settlement route
    Route::post(uri: '{susu}/settlements', action: PersonalSusuSettlementController::class)
        ->name(name: 'settlements.store');

    // PersonalSusu pending settlement route
    Route::post(uri: '{susu}/pends/settlements', action: PersonalSusuSettlementPendController::class)
        ->name(name: 'pends.settlements.store');

    // PersonalSusu zero-outs settlement route
    Route::post(uri: '{susu}/zero-outs/settlements', action: PersonalSusuSettlementZeroOutController::class)
        ->name(name: 'zero-outs.settlements.store');

    // PersonalSusu settlement cancellations route
    Route::post(uri: '{susu}/settlements/{settlement}/cancellations', action: PersonalSusuSettlementCancellationController::class)
        ->name(name: 'settlements.cancellations.update');

    // PersonalSusu settlement approval route
    Route::post(uri: '{susu}/settlements/{settlement}/approvals', action: PersonalSusuSettlementApprovalController::class)
        ->name(name: 'settlements.update');
});
