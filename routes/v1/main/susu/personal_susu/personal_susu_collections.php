<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Susu\PersonalSusu\Collection\PersonalSusuCollectionSummaryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/susus/personal-susus', 'as' => 'customers.susus.personal-susus.', 'middleware' => 'auth:customer'], function (): void {
    // PersonalSusu collection summaries
    Route::get(uri: '{susu}/collections/summaries', action: PersonalSusuCollectionSummaryController::class)
        ->name(name: 'collections/summaries.show');
});
