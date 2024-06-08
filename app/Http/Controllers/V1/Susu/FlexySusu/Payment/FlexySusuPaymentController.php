<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\Payment\FlexySusuPaymentAction;
use Illuminate\Http\Request;

final class FlexySusuPaymentController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the FlexySusuPaymentAction
        return FlexySusuPaymentAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
