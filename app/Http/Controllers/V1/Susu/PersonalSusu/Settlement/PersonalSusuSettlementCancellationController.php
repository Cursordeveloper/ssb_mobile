<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\Settlement;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\Settlement\PersonalSusuSettlementCancellationAction;
use Illuminate\Http\Request;

final class PersonalSusuSettlementCancellationController extends Controller
{
    public function __invoke(string $susu, string $settlement, Request $request): array
    {
        // Execute and return the PersonalSusuSettlementCancellationAction
        return PersonalSusuSettlementCancellationAction::execute(customer: auth()->user(), susu: $susu, settlement: $settlement, request: $request->all());
    }
}
