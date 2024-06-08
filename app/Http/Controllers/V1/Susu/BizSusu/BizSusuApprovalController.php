<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\BizSusu;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Pin\PinApprovalRequest;
use Domain\Susu\BizSusu\Actions\BizSusuApprovalAction;

final class BizSusuApprovalController extends Controller
{
    public function __invoke(string $susu, PinApprovalRequest $request): array
    {
        // Execute and return the BizSusuApprovalAction
        return BizSusuApprovalAction::execute(customer: auth()->user(), susu: $susu, request: $request->validated());
    }
}
