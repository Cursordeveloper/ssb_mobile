<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\LinkedAccount\LinkAccountApprovalController;
use App\Http\Controllers\V1\Customer\LinkedAccount\LinkAccountController;
use App\Http\Controllers\V1\Customer\LinkedAccount\LinkedAccountController;
use App\Http\Controllers\V1\Customer\LinkedAccount\LinkedAccountsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customers/linked-accounts',
    'as' => 'customers.linked-accounts.',
], function (): void {
    Route::group([
        'middleware' => 'auth:customer',
    ], function (): void {
        Route::post(
            uri: '',
            action: LinkAccountController::class
        )->name(
            name: 'store'
        );
        Route::post(
            uri: '{linked_account}/approval',
            action: LinkAccountApprovalController::class
        )->name(
            name: 'approval'
        );
        Route::get(
            uri: '',
            action: LinkedAccountsController::class
        )->name(
            name: 'index'
        );
        Route::get(
            uri: '{linked_account}',
            action: LinkedAccountController::class
        )->name(
            name: 'show'
        );
    });
});
