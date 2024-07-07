<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\GoalGetterSusu\Withdrawal;

use App\Http\Controllers\Controller;
use Domain\Susu\GoalGetterSusu\Actions\Withdrawal\GoalGetterSusuWithdrawalCancellationAction;
use Illuminate\Http\Request;

final class GoalGetterSusuWithdrawalCancellationController extends Controller
{
    public function __invoke(string $susu, string $withdrawal, Request $request): array
    {
        // Execute and return the GoalGetterSusuWithdrawalCancellationAction
        return GoalGetterSusuWithdrawalCancellationAction::execute(customer: auth()->user(), susu: $susu, withdrawal: $withdrawal, request: $request->all());
    }
}
