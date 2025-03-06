<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\AccountPause;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Pause\DailySusuAccountPauseApprovalAction;
use Illuminate\Http\Request;

final class DailySusuAccountPauseApprovalController extends Controller
{
    public function __invoke(
        string $susu,
        string $account_pause,
        Request $request,
        DailySusuAccountPauseApprovalAction $dailySusuAccountPauseApprovalAction
    ): array {
        // Execute and return the DailySusuAccountPauseApprovalAction
        return $dailySusuAccountPauseApprovalAction->execute(
            customer: auth()->user(),
            susu: $susu,
            account_pause: $account_pause,
            request: $request->all()
        );
    }
}
