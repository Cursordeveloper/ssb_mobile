<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Payment\DailySusuPaymentAction;
use Illuminate\Http\Request;

final class DailySusuPaymentController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonaSusuPaymentAction
        return DailySusuPaymentAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
