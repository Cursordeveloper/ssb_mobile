<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\BizSusu\DebitRollover\BizSusuDebitRolloverController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'customers/susus/biz-susus',
    'as' => 'customers.susus.biz-susus.',
    'middleware' => 'auth:customer',
], function (): void {
    // PersonalSusu debit rollover route
    Route::post(
        uri: '{susu}/debits/rollovers',
        action: BizSusuDebitRolloverController::class
    )->name(name: 'debits.rollovers');
});
