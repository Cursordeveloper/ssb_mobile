<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\GoalGetterSusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\GoalGetterSusu\Actions\Payment\GoalGetterSusuPaymentAction;
use Illuminate\Http\Request;

final class GoalGetterSusuPaymentController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the GoalGetterSusuPaymentAction
        return GoalGetterSusuPaymentAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
