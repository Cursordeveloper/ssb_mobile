<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\GoalGetterSusu\Withdrawal;

use App\Http\Controllers\Controller;
use Domain\Susu\GoalGetterSusu\Actions\Withdrawal\GoalGetterSusuFullWithdrawalAction;
use Illuminate\Http\Request;

final class GoalGetterSusuFullWithdrawalController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the GoalGetterSusuFullWithdrawalAction
        return GoalGetterSusuFullWithdrawalAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
