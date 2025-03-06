<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\AccountLock;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Lock\DailySusuAccountLockApprovalAction;
use Illuminate\Http\Request;

final class DailySusuAccountLockApprovalController extends Controller
{
    public function __invoke(
        string $susu,
        string $account_lock,
        Request $request,
        DailySusuAccountLockApprovalAction $dailySusuAccountLockApprovalAction
    ): array {
        // Execute and return the DailySusuAccountLockApprovalAction
        return $dailySusuAccountLockApprovalAction->execute(
            customer: auth()->user(),
            susu: $susu,
            account_lock: $account_lock,
            request: $request->all()
        );
    }
}
