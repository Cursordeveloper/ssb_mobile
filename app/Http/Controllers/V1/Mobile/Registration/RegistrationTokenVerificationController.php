<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Registration\RegistrationActivationRequest;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Actions\Registration\RegistrationTokenVerificationAction;
use Domain\Mobile\Models\Customer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationTokenVerificationController extends Controller
{
    public function __invoke(Customer $customer, RegistrationActivationRequest $request): JsonResponse
    {
        // Execute the RegistrationTokenVerificationAction
        $customer = RegistrationTokenVerificationAction::execute(customer: $customer, request: $request->validated());

        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Registration token has been verified successfully.',
            data: new RegistrationResource($customer),
        );
    }
}
