<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Settlement;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Settlement\DailySusuSettlementZeroOutAction;
use Illuminate\Http\Request;

final class DailySusuSettlementZeroOutController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the DailySusuSettlementZeroOutAction
        return DailySusuSettlementZeroOutAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
