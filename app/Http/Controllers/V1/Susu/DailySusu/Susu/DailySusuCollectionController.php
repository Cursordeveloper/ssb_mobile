<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Account;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Susu\DailySusuCollectionAction;

final class DailySusuCollectionController extends Controller
{
    public function __invoke(
        DailySusuCollectionAction $dailySusuCollection
    ): array {
        // Execute and return the DailySusuCollectionAction
        return $dailySusuCollection->execute(
            customer: auth()->user()
        );
    }
}
