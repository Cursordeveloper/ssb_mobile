<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Settlement;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Settlement\DailySusuSettlementAction;
use Illuminate\Http\Request;

final class DailySusuSettlementController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonaSusuSettlementAction
        return DailySusuSettlementAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
