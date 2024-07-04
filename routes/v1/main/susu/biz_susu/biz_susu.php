<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\BizSusu\BizSusuApprovalController;
use App\Http\Controllers\V1\Susu\BizSusu\BizSusuCancellationController;
use App\Http\Controllers\V1\Susu\BizSusu\BizSusuCollectionController;
use App\Http\Controllers\V1\Susu\BizSusu\BizSusuController;
use App\Http\Controllers\V1\Susu\BizSusu\BizSusuCreateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/biz-susus', 'as' => 'customers.susus.biz-susus.', 'middleware' => 'auth:customer'], function (): void {
    // BizSusuCreateController route
    Route::post(uri: 'creations', action: BizSusuCreateController::class)
        ->name(name: 'creations.store');

    // BizSusuCancellationController route
    Route::post(uri: '{susu}/cancellations', action: BizSusuCancellationController::class)
        ->name(name: 'cancellations.delete');

    // BizSusuApprovalController route
    Route::post(uri: '{susu}/approvals', action: BizSusuApprovalController::class)
        ->name(name: 'approvals.update');

    // BizSusuCollectionController route
    Route::get(uri: 'collections', action: BizSusuCollectionController::class)
        ->name(name: 'collections.index');

    // BizSusuController route
    Route::get(uri: '{susu}', action: BizSusuController::class)
        ->name(name: 'show');
});
