<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Payment\DailySusuPaymentApprovalAction;
use Illuminate\Http\Request;

final class DailySusuPaymentApprovalController extends Controller
{
    public function __invoke(string $susu, string $payment, Request $request): array
    {
        // Execute and return the DailySusuPaymentApprovalAction
        return DailySusuPaymentApprovalAction::execute(customer: auth()->user(), susu: $susu, payment: $payment, request: $request->all());
    }
}
