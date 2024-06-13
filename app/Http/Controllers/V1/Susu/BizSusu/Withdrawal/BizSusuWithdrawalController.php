<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\Withdrawal;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\Withdrawal\BizSusuWithdrawalAction;
use Illuminate\Http\Request;

final class BizSusuWithdrawalController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the BizSusuWithdrawalAction
        return BizSusuWithdrawalAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
