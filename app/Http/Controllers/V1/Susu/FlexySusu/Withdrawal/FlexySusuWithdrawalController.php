<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu\Withdrawal;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\Withdrawal\FlexySusuWithdrawalAction;
use Illuminate\Http\Request;

final class FlexySusuWithdrawalController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the FlexySusuWithdrawalAction
        return FlexySusuWithdrawalAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
