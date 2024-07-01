<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\Payment\PersonalSusuPaymentCancellationAction;
use Illuminate\Http\Request;

final class PersonalSusuPaymentCancellationController extends Controller
{
    public function __invoke(string $susu, string $payment, Request $request): array
    {
        // Execute and return the PersonalSusuPaymentCancellationAction
        return PersonalSusuPaymentCancellationAction::execute(customer: auth()->user(), susu: $susu, payment: $payment, request: $request->all());
    }
}
