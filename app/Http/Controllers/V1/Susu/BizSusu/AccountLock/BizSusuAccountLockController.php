<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu\AccountLock;

use App\Http\Controllers\Controller;
use Domain\Susu\BizSusu\Actions\AccountLock\BizSusuAccountLockAction;
use Illuminate\Http\Request;

final class BizSusuAccountLockController extends Controller
{
    public function __invoke(string $susu, Request $request): array
    {
        // Execute and return the BizSusuAccountLockAction
        return BizSusuAccountLockAction::execute(customer: auth()->user(), susu: $susu, request: $request->all());
    }
}
