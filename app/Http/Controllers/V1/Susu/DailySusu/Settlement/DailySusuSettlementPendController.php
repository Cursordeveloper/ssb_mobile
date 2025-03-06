<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Settlement;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Settlement\DailySusuSettlementPendAction;
use Illuminate\Http\Request;

final class DailySusuSettlementPendController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the DailySusuSettlementPendAction
        return DailySusuSettlementPendAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
