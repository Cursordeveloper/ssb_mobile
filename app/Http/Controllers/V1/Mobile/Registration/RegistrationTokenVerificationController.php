<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Registration\RegistrationActivationRequest;
use Domain\Mobile\Actions\Registration\RegistrationTokenVerificationAction;
use Domain\Mobile\Models\Customer;
use Symfony\Component\HttpFoundation\JsonResponse;

final class RegistrationTokenVerificationController extends Controller
{
    public function __invoke(
        Customer $customer,
        RegistrationActivationRequest $request,
        RegistrationTokenVerificationAction $registrationTokenVerificationAction
    ): JsonResponse {
        // Execute the RegistrationTokenVerificationAction and return the JsonResponse
        return $registrationTokenVerificationAction->execute(
            customer: $customer,
            request: $request->validated()
        );
    }
}
