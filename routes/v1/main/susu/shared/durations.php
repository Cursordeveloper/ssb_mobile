<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Shared\Duration\DurationsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/durations', 'as' => 'customers.susus.durations.', 'middleware' => 'auth:customer'], function (): void {
    // Get all durations route
    Route::get(
        uri: '',
        action: DurationsController::class
    )->name(
        name: 'index'
    );
});
