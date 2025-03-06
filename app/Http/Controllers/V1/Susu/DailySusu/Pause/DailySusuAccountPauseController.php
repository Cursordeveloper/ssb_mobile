<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\AccountPause;

use App\Http\Controllers\Controller;
use Domain\Susu\DailySusu\Actions\Pause\DailySusuAccountPauseAction;
use Illuminate\Http\Request;

final class DailySusuAccountPauseController extends Controller
{
    public function __invoke(
        string $susu,
        Request $request,
        DailySusuAccountPauseAction $dailySusuAccountPauseAction
    ): array {
        // Execute and return the DailySusuAccountPauseAction
        return $dailySusuAccountPauseAction->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request->all()
        );
    }
}
