<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Personal\PersonalSusuApprovalController;
use App\Http\Controllers\V1\Susu\Personal\PersonalSusuCollectionController;
use App\Http\Controllers\V1\Susu\Personal\PersonalSusuController;
use App\Http\Controllers\V1\Susu\Personal\PersonalSusuCreateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/personal-susus', 'as' => 'customers.susus.personal-susus.', 'middleware' => 'auth:customer'], function (): void {
    // PersonalSusuCreateController route
    Route::post(
        uri: 'creations',
        action: PersonalSusuCreateController::class
    )->name(
        name: 'store'
    );

    // PersonalSusuApprovalController route
    Route::post(
        uri: '{susu}/approvals',
        action: PersonalSusuApprovalController::class
    )->name(
        name: 'update'
    );

    // PersonalSusuCollectionController route
    Route::get(
        uri: 'collections',
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
});
