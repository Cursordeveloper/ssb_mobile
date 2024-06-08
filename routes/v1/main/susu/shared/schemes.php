<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\Shared\Scheme\SchemesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/schemes', 'as' => 'customers.susus.schemes.', 'middleware' => 'auth:customer'], function (): void {
    // Get all schemes route
    Route::get(uri: '', action: SchemesController::class)
        ->name(name: 'index');
});
