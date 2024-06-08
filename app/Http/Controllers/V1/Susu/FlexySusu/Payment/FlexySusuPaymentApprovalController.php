<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\Payment\FlexySusuPaymentApprovalAction;
use Illuminate\Http\Request;

final class FlexySusuPaymentApprovalController extends Controller
{
    public function __invoke(string $susu, string $payment, Request $request): array
    {
        // Execute and return the FlexySusuPaymentApprovalAction
        return FlexySusuPaymentApprovalAction::execute(customer: auth()->user(), susu: $susu, payment: $payment, request: $request->all());
    }
}
