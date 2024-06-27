<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\Settlement;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\Settlement\PersonalSusuSettlementAction;
use Domain\Susu\PersonalSusu\Actions\Settlement\PersonalSusuSettlementZeroOutAction;
use Illuminate\Http\Request;

final class PersonalSusuSettlementZeroOutController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonalSusuSettlementZeroOutAction
        return PersonalSusuSettlementZeroOutAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
