<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\PersonalSusu\AccountLock;

use App\Http\Controllers\Controller;
use Domain\Susu\PersonalSusu\Actions\AccountLock\PersonalSusuAccountLockCancellationAction;
use Illuminate\Http\Request;

final class PersonalSusuAccountLockCancellationController extends Controller
{
    public function __invoke(string $susu, string $account_lock, Request $request): array
    {
        // Execute and return the PersonalSusuAccountLockCancellationAction
        return PersonalSusuAccountLockCancellationAction::execute(customer: auth()->user(), susu: $susu, account_lock: $account_lock, request: $request->all());
    }
}
