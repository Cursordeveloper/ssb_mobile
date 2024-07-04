<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\GoalGetterSusu\GoalGetterSusuApprovalController;
use App\Http\Controllers\V1\Susu\GoalGetterSusu\GoalGetterSusuCancellationController;
use App\Http\Controllers\V1\Susu\GoalGetterSusu\GoalGetterSusuCollectionController;
use App\Http\Controllers\V1\Susu\GoalGetterSusu\GoalGetterSusuController;
use App\Http\Controllers\V1\Susu\GoalGetterSusu\GoalGetterSusuCreateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/goal-getter-susus', 'as' => 'customers.susus.goal-getter-susus.', 'middleware' => 'auth:customer'], function (): void {
    // GoalGetterSusuCreateController route
    Route::post(uri: 'creations', action: GoalGetterSusuCreateController::class)
        ->name(name: 'creations.store');

    // GoalGetterSusuCancellationController route
    Route::post(uri: '{susu}/cancellations', action: GoalGetterSusuCancellationController::class)
        ->name(name: 'cancellations.update');

    // GoalGetterSusuApprovalController route
    Route::post(uri: '{susu}/approvals', action: GoalGetterSusuApprovalController::class)
        ->name(name: 'approvals.update');

    // GoalGetterSusuCollectionController route
    Route::get(uri: 'collections', action: GoalGetterSusuCollectionController::class)
        ->name(name: 'collections.index');

    // GoalGetterSusuController route
    Route::get(uri: '{susu}', action: GoalGetterSusuController::class)
        ->name(name: 'show');
});
