<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Personal\PersonalSusuApprovalController;
use App\Http\Controllers\V1\Susu\Personal\PersonalSusuBalanceController;
use App\Http\Controllers\V1\Susu\Personal\PersonalSusuCollectionController;
use App\Http\Controllers\V1\Susu\Personal\PersonalSusuController;
use App\Http\Controllers\V1\Susu\Personal\PersonalSusuCreateController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'susu/personal',
    'as' => 'susu.personal.',
], function (): void {
    Route::group([
        'middleware' => 'auth:customer',
    ], function (): void {
        // CreatePersonalSusu route
        Route::post(
            uri: '',
            action: PersonalSusuCreateController::class
        )->name(
            name: 'store'
        );

        // PersonalSusuApprovalController route
        Route::post(
            uri: '{susu}/approval',
            action: PersonalSusuApprovalController::class
        )->name(
            name: 'approval'
        )->whereUuid(['susu']);

        // PersonalSusuCollectionController route
        Route::get(
            uri: '',
            action: PersonalSusuCollectionController::class
        )->name(
            name: 'index'
        );

        // PersonalSusuController route
        Route::get(
            uri: '{susu}',
            action: PersonalSusuController::class
        )->name(
            name: 'show'
        );

        // PersonalSusuBalanceController route
        Route::get(
            uri: '{susu}/balance',
            action: PersonalSusuBalanceController::class
        )->name(
            name: 'balance.show'
        );
    });
});
