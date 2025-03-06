<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Account;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Susu\DailySusuAction;
use Illuminate\Http\Request;

final class DailySusuController extends Controller
{
    public function __invoke(
        string $susu,
        Request $request,
        DailySusuAction $dailySusuAction
    ): array {
        // Execute and return the DailySusuAction
        return $dailySusuAction->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request->toArray()
        );
    }
}
