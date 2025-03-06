<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Payment\DailySusuPaymentCancellationAction;
use Illuminate\Http\Request;

final class DailySusuPaymentCancellationController extends Controller
{
    public function __invoke(string $susu, string $payment, Request $request): array
    {
        // Execute and return the DailySusuPaymentCancellationAction
        return DailySusuPaymentCancellationAction::execute(customer: auth()->user(), susu: $susu, payment: $payment, request: $request->all());
    }
}
