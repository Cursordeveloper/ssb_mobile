<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\PersonalSusu\DebitRollover\PersonalSusuDebitRolloverController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customers/susus/personal-susus',
    'as' => 'customers.susus.personal-susus.',
    'middleware' => 'auth:customer',
], function (): void {
    // PersonalSusu debit rollover route
    Route::post(
        uri: '{susu}/debits/rollovers',
        action: PersonalSusuDebitRolloverController::class
    )->name(name: 'debits.rollovers');
});
