<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu\Withdrawal;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\Withdrawal\FlexySusuWithdrawalCancellationAction;
use Illuminate\Http\Request;

final class FlexySusuWithdrawalCancellationController extends Controller
{
    public function __invoke(string $susu, string $withdrawal, Request $request): array
    {
        // Execute and return the FlexySusuWithdrawalCancellationAction
        return FlexySusuWithdrawalCancellationAction::execute(customer: auth()->user(), susu: $susu, withdrawal: $withdrawal, request: $request->all());
    }
}
