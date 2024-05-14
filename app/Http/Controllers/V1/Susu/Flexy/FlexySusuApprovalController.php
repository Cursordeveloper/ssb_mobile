<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Susu\Flexy;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Pin\PinApprovalRequest;
use Domain\Susu\Flexy\Actions\FlexySusuApprovalAction;

final class FlexySusuApprovalController extends Controller
{
    public function __invoke(string $susu, PinApprovalRequest $request): array
    {
        // Execute and return the FlexySusuApprovalAction
        return FlexySusuApprovalAction::execute(customer: auth()->user(), susu: $susu, request: $request->validated());
    }
}
