<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\Settlement;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\Settlement\PersonalSusuAutomatedSettlementAction;
use Illuminate\Http\Request;

final class PersonalSusuAutomatedSettlementController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonalSusuAutomatedSettlementAction
        return PersonalSusuAutomatedSettlementAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
