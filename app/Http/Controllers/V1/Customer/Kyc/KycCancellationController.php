<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Kyc;

use App\Http\Controllers\Controller;
use Domain\Customer\Actions\Kyc\KycCancellationAction;
use Illuminate\Http\Request;

final class KycCancellationController extends Controller
{
    public function __invoke(string $kyc, Request $request): array
    {
        // Execute and return the KycApprovalAction
        return KycCancellationAction::execute(customer: auth()->user(), kyc: $kyc, request: $request->all());
    }
}
