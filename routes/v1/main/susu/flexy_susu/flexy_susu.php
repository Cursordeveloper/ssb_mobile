<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\FlexySusu\FlexySusuApprovalController;
use App\Http\Controllers\V1\Susu\FlexySusu\FlexySusuCancellationController;
use App\Http\Controllers\V1\Susu\FlexySusu\FlexySusuCollectionController;
use App\Http\Controllers\V1\Susu\FlexySusu\FlexySusuController;
use App\Http\Controllers\V1\Susu\FlexySusu\FlexySusuCreateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/flexy-susus', 'as' => 'customers.susus.flexy-susus.', 'middleware' => 'auth:customer'], function (): void {
    // FlexySusuCreateController route
    Route::post(uri: 'creations', action: FlexySusuCreateController::class)
        ->name(name: 'creations.store');

    // FlexySusuCancellationController route
    Route::post(uri: '{susu}/cancellations', action: FlexySusuCancellationController::class)
        ->name(name: 'cancellations.update');

    // FlexySusuApprovalController route
    Route::post(uri: '{susu}/approvals', action: FlexySusuApprovalController::class)
        ->name(name: 'approvals.update');

    // FlexySusuCollectionController route
    Route::get(uri: 'collections', action: FlexySusuCollectionController::class)
        ->name(name: 'collections.index');

    // FlexySusuController route
    Route::get(uri: '{susu}', action: FlexySusuController::class)
        ->name(name: 'show');
});
