<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Settlement;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Settlement\DailySusuSettlementCancellationAction;
use Illuminate\Http\Request;

final class DailySusuSettlementCancellationController extends Controller
{
    public function __invoke(
        string $susu,
        string $settlement,
        Request $request
    ): array {
        // Execute and return the DailySusuSettlementCancellationAction
        return DailySusuSettlementCancellationAction::execute(customer: auth()->user(), susu: $susu, settlement: $settlement, request: $request->all());
    }
}
