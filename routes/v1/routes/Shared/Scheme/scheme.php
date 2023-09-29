<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Shared\Scheme\SchemeCollectionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'schemes', 'as' => 'schemes.'], function (): void {
    // Unprotected routes
    Route::group([], function (): void {
    });

    // Protected routes
    Route::group(['middleware' => 'auth:customer'], function (): void {
        Route::get(
            uri: '',
            action: SchemeCollectionController::class
        )->name(
            name: 'index'
        );
    });
});
