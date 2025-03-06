<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\AccountPause;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\AccountPause\BizSusuAccountPauseCancellationAction;
use Illuminate\Http\Request;

final class BizSusuAccountPauseCancellationController extends Controller
{
    public function __invoke(string $susu, string $account_pause, Request $request): array
    {
        // Execute and return the BizSusuAccountPauseCancellationAction
        return BizSusuAccountPauseCancellationAction::execute(customer: auth()->user(), susu: $susu, account_pause: $account_pause, request: $request->all());
    }
}
