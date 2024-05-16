<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Kyc;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Pin\PinApprovalRequest;
use Domain\Customer\Actions\Kyc\KycApprovalAction;

final class KycApprovalController extends Controller
{
    public function __invoke(string $kyc, PinApprovalRequest $request): array
    {
        // Execute and return the KycApprovalAction
        return KycApprovalAction::execute(customer: auth()->user(), kyc: $kyc, request: $request->validated());
    }
}
