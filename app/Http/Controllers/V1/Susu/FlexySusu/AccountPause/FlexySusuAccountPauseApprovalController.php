<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu\AccountPause;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\AccountPause\FlexySusuAccountPauseApprovalAction;
use Illuminate\Http\Request;

final class FlexySusuAccountPauseApprovalController extends Controller
{
    public function __invoke(string $susu, string $account_pause, Request $request): array
    {
        // Execute and return the FlexySusuAccountPauseApprovalAction
        return FlexySusuAccountPauseApprovalAction::execute(customer: auth()->user(), susu: $susu, account_pause: $account_pause, request: $request->all());
    }
}
