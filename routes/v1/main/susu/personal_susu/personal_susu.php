<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\PersonalSusu\PersonalSusuApprovalController;
use App\Http\Controllers\V1\Susu\PersonalSusu\PersonalSusuCancellationController;
use App\Http\Controllers\V1\Susu\PersonalSusu\PersonalSusuCollectionController;
use App\Http\Controllers\V1\Susu\PersonalSusu\PersonalSusuController;
use App\Http\Controllers\V1\Susu\PersonalSusu\PersonalSusuCreateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/personal-susus', 'as' => 'customers.susus.personal-susus.', 'middleware' => 'auth:customer'], function (): void {
    // PersonalSusuCreateController route
    Route::post(uri: 'creations', action: PersonalSusuCreateController::class)
        ->name(name: 'creations.store');

    // PersonalSusuCancellationController route
    Route::post(uri: '{susu}/cancellations', action: PersonalSusuCancellationController::class)
        ->name(name: 'cancellations.delete');

    // PersonalSusuApprovalController route
    Route::post(uri: '{susu}/approvals', action: PersonalSusuApprovalController::class)
        ->name(name: 'approvals.update');

    // PersonalSusuCollectionController route
    Route::get(uri: 'collections', action: PersonalSusuCollectionController::class)
        ->name(name: 'collections.index');

    // PersonalSusuController route
    Route::get(uri: '{susu}', action: PersonalSusuController::class)
        ->name(name: 'show');
});
