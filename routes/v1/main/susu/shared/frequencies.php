<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Shared\Frequency\FrequenciesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/frequencies', 'as' => 'customers.susus.frequencies.', 'middleware' => 'auth:customer'], function (): void {
    // Get all frequencies route
    Route::get(uri: '', action: FrequenciesController::class)
        ->name(name: 'index');
});
