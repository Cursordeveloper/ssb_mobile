<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\Withdrawal;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\Withdrawal\BizSusuWithdrawalCancellationAction;
use Illuminate\Http\Request;

final class BizSusuWithdrawalCancellationController extends Controller
{
    public function __invoke(string $susu, string $withdrawal, Request $request): array
    {
        // Execute and return the BizSusuWithdrawalCancellationAction
        return BizSusuWithdrawalCancellationAction::execute(customer: auth()->user(), susu: $susu, withdrawal: $withdrawal, request: $request->all());
    }
}
