<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Customer\LinkedAccountScheme\LinkedAccountSchemeCollectionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customers/linked-account-schemes',
    'as' => 'customers.linked-account-schemes.',
], function (): void {
    Route::group([
        'middleware' => 'auth:customer',
    ], function (): void {
        Route::get(
            uri: '',
            action: LinkedAccountSchemeCollectionController::class
        )->name(
            name: 'collection',
        );
    });
});
