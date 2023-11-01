<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('v1/mobile')
    ->as('v1.mobile:')
    ->group(base_path('routes/v1/routes.php'));
