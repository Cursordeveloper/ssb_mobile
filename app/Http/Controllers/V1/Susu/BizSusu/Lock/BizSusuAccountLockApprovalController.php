<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\AccountLock;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\AccountLock\BizSusuAccountLockApprovalAction;
use Illuminate\Http\Request;

final class BizSusuAccountLockApprovalController extends Controller
{
    public function __invoke(string $susu, string $account_lock, Request $request): array
    {
        // Execute and return the BizSusuAccountLockApprovalAction
        return BizSusuAccountLockApprovalAction::execute(customer: auth()->user(), susu: $susu, account_lock: $account_lock, request: $request->all());
    }
}
