<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\GoalGetterSusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\GoalGetterSusu\Actions\Payment\GoalGetterSusuPaymentCancellationAction;
use Illuminate\Http\Request;

final class GoalGetterSusuPaymentCancellationController extends Controller
{
    public function __invoke(string $susu, string $payment, Request $request): array
    {
        // Execute and return the GoalGetterSusuPaymentCancellationAction
        return GoalGetterSusuPaymentCancellationAction::execute(customer: auth()->user(), susu: $susu, payment: $payment, request: $request->all());
    }
}
