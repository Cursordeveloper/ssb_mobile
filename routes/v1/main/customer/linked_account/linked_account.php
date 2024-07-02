<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\LinkedAccount\LinkAccountApprovalController;
use App\Http\Controllers\V1\Customer\LinkedAccount\LinkAccountCancellationController;
use App\Http\Controllers\V1\Customer\LinkedAccount\LinkAccountController;
use App\Http\Controllers\V1\Customer\LinkedAccount\LinkedAccountController;
use App\Http\Controllers\V1\Customer\LinkedAccount\LinkedAccountsController;
use App\Http\Controllers\V1\Customer\LinkedAccountScheme\LinkedAccountSchemesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/linked-accounts', 'as' => 'customers.linked-accounts.', 'middleware' => 'auth:customer'], function (): void {
    // Get all linked accounts schemes
    Route::get(uri: 'schemes', action: LinkedAccountSchemesController::class)
        ->name(name: 'schemes.collection');

    // Create new linked account
    Route::post(uri: '', action: LinkAccountController::class)
        ->name(name: 'store');

    // Cancel new linked account
    Route::post(uri: '{linked_account}/cancellations', action: LinkAccountCancellationController::class)
        ->name(name: 'cancellations');

    // Approve new linked account
    Route::post(uri: '{linked_account}/approvals', action: LinkAccountApprovalController::class)
        ->name(name: 'approvals');

    // Get all linked accounts
    Route::get(uri: '', action: LinkedAccountsController::class)
        ->name(name: 'index');

    // Get a linked account
    Route::get(uri: '{linked_account}', action: LinkedAccountController::class)
        ->name(name: 'show');
});
