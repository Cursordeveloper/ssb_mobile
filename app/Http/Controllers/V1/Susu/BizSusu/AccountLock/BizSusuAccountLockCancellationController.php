<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\AccountLock;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\AccountLock\BizSusuAccountLockCancellationAction;
use Illuminate\Http\Request;

final class BizSusuAccountLockCancellationController extends Controller
{
    public function __invoke(string $susu, string $account_lock, Request $request): array
    {
        // Execute and return the BizSusuAccountLockCancellationAction
        return BizSusuAccountLockCancellationAction::execute(customer: auth()->user(), susu: $susu, account_lock: $account_lock, request: $request->all());
    }
}
