<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\AccountPause;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\AccountPause\PersonalSusuAccountPauseCancellationAction;
use Illuminate\Http\Request;

final class PersonalSusuAccountPauseCancellationController extends Controller
{
    public function __invoke(string $susu, string $account_pause, Request $request): array
    {
        // Execute and return the PersonalSusuAccountPauseCancellationAction
        return PersonalSusuAccountPauseCancellationAction::execute(customer: auth()->user(), susu: $susu, account_pause: $account_pause, request: $request->all());
    }
}
