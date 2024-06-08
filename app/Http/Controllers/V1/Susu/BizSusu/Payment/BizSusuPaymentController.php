<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\Payment\BizSusuPaymentAction;
use Illuminate\Http\Request;

final class BizSusuPaymentController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the BizSusuPaymentAction
        return BizSusuPaymentAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
