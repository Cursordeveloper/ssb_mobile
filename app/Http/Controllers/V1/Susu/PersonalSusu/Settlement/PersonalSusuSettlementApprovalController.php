<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\Settlement;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\Settlement\PersonalSusuSettlementApprovalAction;
use Illuminate\Http\Request;

final class PersonalSusuSettlementApprovalController extends Controller
{
    public function __invoke(string $susu, string $settlement, Request $request): array
    {
        // Execute and return the PersonalSusuSettlementApprovalAction
        return PersonalSusuSettlementApprovalAction::execute(customer: auth()->user(), susu: $susu, settlement: $settlement, request: $request->all());
    }
}
