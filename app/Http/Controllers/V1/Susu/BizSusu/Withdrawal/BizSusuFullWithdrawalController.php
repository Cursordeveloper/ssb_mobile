<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\Withdrawal;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\Withdrawal\BizSusuFullWithdrawalAction;
use Illuminate\Http\Request;

final class BizSusuFullWithdrawalController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the BizSusuFullWithdrawalAction
        return BizSusuFullWithdrawalAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
