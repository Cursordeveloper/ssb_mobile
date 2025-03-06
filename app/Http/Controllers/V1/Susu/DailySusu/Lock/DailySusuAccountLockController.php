<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\AccountLock;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Lock\DailySusuAccountLockAction;
use Illuminate\Http\Request;

final class DailySusuAccountLockController extends Controller
{
    public function __invoke(
        string $susu,
        Request $request,
        DailySusuAccountLockAction $dailySusuAccountLockAction
    ): array {
        // Execute and return the DailySusuAccountLockAction
        return $dailySusuAccountLockAction->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request->all()
        );
    }
}
