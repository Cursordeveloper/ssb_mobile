<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\Payment;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\Payment\PersonalSusuPaymentAction;
use Illuminate\Http\Request;

final class PersonalSusuPaymentController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the PersonaSusuPaymentAction
        return PersonalSusuPaymentAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
