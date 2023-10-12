<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Registration\RegistrationTokenRequest;
use Domain\Customer\Actions\Common\GetCustomerAction;
use Domain\Customer\Actions\Common\Token\GenerateTokenAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationTokenController extends Controller
{
    public function __invoke(
        RegistrationTokenRequest $request,
    ): JsonResponse {
        // Get the customer
        $customer = GetCustomerAction::execute(
            resource: data_get(
                target: $request->validated(),
                key: 'data.attributes.email',
            )
        );

        // Generate the token
        GenerateTokenAction::execute(
            customer: $customer,
        );

        // Return the resourceResponseBuilder with the CustomerResource as data
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Token request in progress. Notification will be sent shortly.',
            data: $customer
        );
    }
}
