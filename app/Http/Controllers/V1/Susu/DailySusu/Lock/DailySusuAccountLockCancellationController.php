<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\AccountLock;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Lock\DailySusuAccountLockCancellationAction;
use Illuminate\Http\Request;

final class DailySusuAccountLockCancellationController extends Controller
{
    public function __invoke(
        string $susu,
        string $account_lock,
        Request $request,
        DailySusuAccountLockCancellationAction $dailySusuAccountLockCancellationAction
    ): array {
        // Execute and return the DailySusuAccountLockCancellationAction
        return $dailySusuAccountLockCancellationAction->execute(
            customer: auth()->user(),
            susu: $susu,
            account_lock: $account_lock,
            request: $request->all()
        );
    }
}
