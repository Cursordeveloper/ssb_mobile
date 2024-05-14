<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

// Main routes
Route::prefix('v1/mobile')
    ->as('v1.mobile:')
    ->group(base_path('routes/v1/main.php'));

// Common routes
Route::prefix('v1/mobile')
    ->as('v1.mobile:')
    ->group(base_path('routes/v1/common.php'));
