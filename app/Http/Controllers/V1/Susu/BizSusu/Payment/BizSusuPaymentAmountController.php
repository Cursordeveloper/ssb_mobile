<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\Payment\BizSusuPaymentAmountAction;
use Illuminate\Http\Request;

final class BizSusuPaymentAmountController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the BizSusuPaymentAmountAction
        return BizSusuPaymentAmountAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
