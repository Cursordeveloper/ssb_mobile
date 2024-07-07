<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\GoalGetterSusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\GoalGetterSusu\Actions\Payment\GoalGetterSusuPaymentAmountAction;
use Illuminate\Http\Request;

final class GoalGetterSusuPaymentAmountController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the GoalGetterSusuPaymentAmountAction
        return GoalGetterSusuPaymentAmountAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
