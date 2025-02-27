<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\GoalGetterSusu\DebitRollover\GoalGetterSusuDebitRolloverController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customers/susus/goal-getter-susus',
    'as' => 'customers.susus.goal-getter-susus.',
    'middleware' => 'auth:customer',
], function (): void {
    // PersonalSusu debit rollover route
    Route::post(
        uri: '{susu}/debits/rollovers',
        action: GoalGetterSusuDebitRolloverController::class
    )->name(name: 'debits.rollovers');
});
