<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu\Withdrawal;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\Withdrawal\FlexySusuWithdrawalApprovalAction;
use Illuminate\Http\Request;

final class FlexySusuWithdrawalApprovalController extends Controller
{
    public function __invoke(string $susu, string $withdrawal, Request $request): array
    {
        // Execute and return the FlexySusuWithdrawalApprovalAction
        return FlexySusuWithdrawalApprovalAction::execute(customer: auth()->user(), susu: $susu, withdrawal: $withdrawal, request: $request->all());
    }
}
