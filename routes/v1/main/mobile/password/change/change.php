<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Mobile\Password\PasswordChangeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customers/passwords',
    'as' => 'customers.passwords.',
    'middleware' => 'auth:customer',
], function (): void {
    // Change password route
    Route::post(
        uri: 'changes',
        action: PasswordChangeController::class,
    )->name(
        name: 'changes'
    );
});
