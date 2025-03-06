<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Susu\Daily\DailySusuCreateRequest;
use Domain\Susu\DailySusu\Actions\Susu\DailySusuCreateAction;

final class DailySusuCreateController extends Controller
{
    public function __invoke(
        DailySusuCreateRequest $request,
        DailySusuCreateAction $dailySusuCreateAction
    ): array {
        // Execute and return the DailySusuCreateAction
        return $dailySusuCreateAction->execute(
            customer: auth()->user(),
            request: $request->validated()
        );
    }
}
