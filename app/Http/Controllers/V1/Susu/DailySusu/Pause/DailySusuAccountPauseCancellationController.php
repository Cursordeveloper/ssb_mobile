<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\AccountPause;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Pause\DailySusuAccountPauseCancellationAction;
use Illuminate\Http\Request;

final class DailySusuAccountPauseCancellationController extends Controller
{
    public function __invoke(
        string $susu,
        string $account_pause,
        Request $request,
        DailySusuAccountPauseCancellationAction $dailySusuAccountPauseCancellationAction
    ): array {
        // Execute and return the DailySusuAccountPauseCancellationAction
        return $dailySusuAccountPauseCancellationAction->execute(
            customer: auth()->user(),
            susu: $susu,
            account_pause: $account_pause,
            request: $request->all()
        );
    }
}
