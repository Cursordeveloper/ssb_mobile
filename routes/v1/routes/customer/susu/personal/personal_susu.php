<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Personal\CreatePersonalSusuController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customers/susu/personal',
    'as' => 'customers.susu.personal.',
], function (): void {
    Route::group([
        'middleware' => 'auth:customer',
    ], function (): void {
        // CreatePersonalSusu route
        Route::post(
            uri: '',
            action: CreatePersonalSusuController::class
        )->name(
            name: 'store'
        );

        // PersonalSusuCollection route
        Route::get(
            uri: '',
            action: CreatePersonalSusuController::class
        )->name(
            name: 'index'
        );
    });
});
