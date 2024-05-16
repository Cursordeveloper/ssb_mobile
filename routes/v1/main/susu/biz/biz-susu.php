<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Biz\BizSusuApprovalController;
use App\Http\Controllers\V1\Susu\Biz\BizSusuCollectionController;
use App\Http\Controllers\V1\Susu\Biz\BizSusuController;
use App\Http\Controllers\V1\Susu\Biz\BizSusuCreateController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/biz-susus', 'as' => 'customers.susus.biz-susus.', 'middleware' => 'auth:customer'], function (): void {
    // BizSusuCreateController route
    Route::post(
        uri: 'creations',
        action: BizSusuCreateController::class
    )->name(
        name: 'store'
    );

    // BizSusuApprovalController route
    Route::post(
        uri: '{susu}/approvals',
        action: BizSusuApprovalController::class
    )->name(
        name: 'update'
    );

    // BizSusuCollectionController route
    Route::get(
        uri: 'collections',
        action: BizSusuCollectionController::class
    )->name(
        name: 'index'
    );

    // BizSusuController route
    Route::get(
        uri: '{susu}',
        action: BizSusuController::class
    )->name(
        name: 'show'
    );
});
