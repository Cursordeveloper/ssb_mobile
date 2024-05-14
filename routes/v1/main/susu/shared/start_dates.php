<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Shared\StartDate\StartDatesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/start-dates', 'as' => 'customers.susus.start-dates.', 'middleware' => 'auth:customer'], function (): void {
    // Get all start dates route
    Route::get(
        uri: '',
        action: StartDatesController::class
    )->name(
        name: 'index'
    );
});
