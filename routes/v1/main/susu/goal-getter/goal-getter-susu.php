<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\GoalGetter\GoalGetterSusuApprovalController;
use App\Http\Controllers\V1\Susu\GoalGetter\GoalGetterSusuCollectionController;
use App\Http\Controllers\V1\Susu\GoalGetter\GoalGetterSusuController;
use App\Http\Controllers\V1\Susu\GoalGetter\GoalGetterSusuCreateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/goal-getter-susus', 'as' => 'customers.susus.goal-getter-susus.', 'middleware' => 'auth:customer'], function (): void {
    // GoalGetterSusuCreateController route
    Route::post(
        uri: 'creations',
        action: GoalGetterSusuCreateController::class
    )->name(
        name: 'store'
    );

    // GoalGetterSusuApprovalController route
    Route::post(
        uri: '{susu}/approvals',
        action: GoalGetterSusuApprovalController::class
    )->name(
        name: 'update'
    );

    // GoalGetterSusuCollectionController route
    Route::get(
        uri: 'collections',
        action: GoalGetterSusuCollectionController::class
    )->name(
        name: 'index'
    );

    // GoalGetterSusuController route
    Route::get(
        uri: '{susu}',
        action: GoalGetterSusuController::class
    )->name(
        name: 'show'
    );
});
