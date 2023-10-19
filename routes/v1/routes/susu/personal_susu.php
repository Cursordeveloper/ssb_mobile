<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Personal\CreatePersonalSusuController;
use App\Http\Controllers\V1\Susu\Personal\PersonalSusuApprovalController;
use App\Http\Controllers\V1\Susu\Personal\PersonalSusuCollectionController;
use App\Http\Controllers\V1\Susu\Personal\PersonalSusuShowController;
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
            action: CreatePersonalSusuController::class
        )->name(
            name: 'store'
        );

        // PersonalSusuShowController route
        Route::get(
            uri: '',
            action: PersonalSusuCollectionController::class
        )->name(
            name: 'index'
        );

        // CreatePersonalSusu route
        Route::post(
            uri: '{susu}/approval',
            action: PersonalSusuApprovalController::class
        )->name(
            name: 'approval'
        )->whereUuid(['susu']);

        // PersonalSusuCollectionController route
        Route::get(
            uri: '{susu}',
            action: PersonalSusuShowController::class
        )->name(
            name: 'show'
        );
    });
});
