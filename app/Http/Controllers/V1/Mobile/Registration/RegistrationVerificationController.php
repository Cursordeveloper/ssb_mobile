<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Registration\RegistrationVerificationRequest;
use Domain\Mobile\Actions\Registration\RegistrationVerificationAction;
use Symfony\Component\HttpFoundation\JsonResponse;

final class RegistrationVerificationController extends Controller
{
    public function __invoke(RegistrationVerificationRequest $request): JsonResponse
    {
        // Execute and return the RegistrationVerificationAction
        return RegistrationVerificationAction::execute(request: $request->validated());
    }
}
