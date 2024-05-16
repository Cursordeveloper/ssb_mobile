<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Flexy\FlexySusuApprovalController;
use App\Http\Controllers\V1\Susu\Flexy\FlexySusuCollectionController;
use App\Http\Controllers\V1\Susu\Flexy\FlexySusuController;
use App\Http\Controllers\V1\Susu\Flexy\FlexySusuCreateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/flexy-susus', 'as' => 'customers.susus.flexy-susus.', 'middleware' => 'auth:customer'], function (): void {
    // FlexySusuCreateController route
    Route::post(
        uri: 'creations',
        action: FlexySusuCreateController::class
    )->name(
        name: 'store'
    );

    // FlexySusuApprovalController route
    Route::post(
        uri: '{susu}/approvals',
        action: FlexySusuApprovalController::class
    )->name(
        name: 'update'
    );

    // FlexySusuCollectionController route
    Route::get(
        uri: 'collections',
        action: FlexySusuCollectionController::class
    )->name(
        name: 'index'
    );

    // FlexySusuController route
    Route::get(
        uri: '{susu}',
        action: FlexySusuController::class
    )->name(
        name: 'show'
    );
});
