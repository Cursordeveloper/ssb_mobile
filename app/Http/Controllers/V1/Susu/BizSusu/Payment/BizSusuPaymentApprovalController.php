<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\Payment\BizSusuPaymentApprovalAction;
use Illuminate\Http\Request;

final class BizSusuPaymentApprovalController extends Controller
{
    public function __invoke(string $susu, string $payment, Request $request): array
    {
        // Execute and return the BizSusuPaymentApprovalAction
        return BizSusuPaymentApprovalAction::execute(customer: auth()->user(), susu: $susu, payment: $payment, request: $request->all());
    }
}
