<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\AccountPause;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\AccountPause\PersonalSusuAccountPauseApprovalAction;
use Illuminate\Http\Request;

final class PersonalSusuAccountPauseApprovalController extends Controller
{
    public function __invoke(string $susu, string $account_pause, Request $request): array
    {
        // Execute and return the PersonalSusuAccountPauseApprovalAction
        return PersonalSusuAccountPauseApprovalAction::execute(customer: auth()->user(), susu: $susu, account_pause: $account_pause, request: $request->all());
    }
}
