<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\PersonalSusu\Settlement\PersonalSusuSettlementApprovalController;
use App\Http\Controllers\V1\Susu\PersonalSusu\Settlement\PersonalSusuSettlementController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/personal-susus', 'as' => 'customers.susus.personal-susus.', 'middleware' => 'auth:customer'], function (): void {
    // PersonalSusu settlement
    Route::post(uri: '{susu}/settlements', action: PersonalSusuSettlementController::class)
        ->name(name: 'settlements.store');

    // PersonalSusu settlement approval
    Route::post(uri: '{susu}/settlements/{settlement}/approvals', action: PersonalSusuSettlementApprovalController::class)
        ->name(name: 'settlements.update');
});
