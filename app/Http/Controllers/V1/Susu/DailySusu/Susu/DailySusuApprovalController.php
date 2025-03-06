<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\DailySusu\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Pin\PinApprovalRequest;
use Domain\Susu\DailySusu\Actions\Susu\DailySusuApprovalAction;

final class DailySusuApprovalController extends Controller
{
    public function __invoke(
        string $susu,
        PinApprovalRequest $request,
        DailySusuApprovalAction $dailySusuApprovalAction
    ): array {
        // Execute and return the DailySusuApprovalAction
        return $dailySusuApprovalAction->execute(
            customer: auth()->user(),
            susu: $susu,
            request: $request->validated()
        );
    }
}
