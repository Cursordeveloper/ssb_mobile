<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu\Withdrawal;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\Withdrawal\FlexySusuFullWithdrawalAction;
use Illuminate\Http\Request;

final class FlexySusuFullWithdrawalController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the FlexySusuFullWithdrawalAction
        return FlexySusuFullWithdrawalAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
