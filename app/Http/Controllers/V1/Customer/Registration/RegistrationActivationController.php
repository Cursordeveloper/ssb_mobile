<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Customer\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customer\Registration\RegistrationActivationRequest;
use Domain\Customer\Actions\Common\GetCustomerAction;
use Domain\Customer\Actions\Registration\RegistrationActivationAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationActivationController extends Controller
{
    public function __invoke(
        RegistrationActivationRequest $request,
    ): JsonResponse {
        // Get the customer
        $customer = GetCustomerAction::execute(
            resource: data_get(
                target: $request->validated(),
                key: 'data.attributes.email',
            )
        );

        // Activate the customer account account
        RegistrationActivationAction::execute(
            customer: $customer
        );

        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_ACCEPTED,
            message: 'Request accepted.',
            description: 'Activation in progress. Notification will be sent shortly.',
            data: $customer->refresh()
        );
    }
}
