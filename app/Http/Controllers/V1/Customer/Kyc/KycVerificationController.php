<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Kyc;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Kyc\KycVerificationRequest;
use Domain\Customer\Actions\Kyc\KycVerificationAction;

final class KycVerificationController extends Controller
{
    public function __invoke(KycVerificationRequest $request): array
    {
        // Execute and return the KycVerificationAction
        return KycVerificationAction::execute(customer: auth()->user(), request: $request->validated());
    }
}
