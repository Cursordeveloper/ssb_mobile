<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\Payment\BizSusuPaymentCancellationAction;
use Illuminate\Http\Request;

final class BizSusuPaymentCancellationController extends Controller
{
    public function __invoke(string $susu, string $payment, Request $request): array
    {
        // Execute and return the BizSusuPaymentCancellationAction
        return BizSusuPaymentCancellationAction::execute(customer: auth()->user(), susu: $susu, payment: $payment, request: $request->all());
    }
}
