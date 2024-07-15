<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\FlexySusu\AccountLock;

use App\Http\Controllers\Controller;
use Domain\Susu\FlexySusu\Actions\AccountLock\FlexySusuAccountLockApprovalAction;
use Illuminate\Http\Request;

final class FlexySusuAccountLockApprovalController extends Controller
{
    public function __invoke(string $susu, string $account_lock, Request $request): array
    {
        // Execute and return the FlexySusuAccountLockApprovalAction
        return FlexySusuAccountLockApprovalAction::execute(customer: auth()->user(), susu: $susu, account_lock: $account_lock, request: $request->all());
    }
}
