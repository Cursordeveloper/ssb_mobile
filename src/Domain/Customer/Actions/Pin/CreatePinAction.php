<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Pin;

use App\Common\ResponseBuilder;
use Domain\Customer\Requests\Pin\CreatePinRequest;
use Domain\Mobile\Actions\Common\Customer\GetCustomerAction;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class CreatePinAction
{
    public static function execute(array $request): JsonResponse
    {
        // Get the customer with the resource_id
        $customer = GetCustomerAction::execute(
            resource: data_get(
                target: $request,
                key: 'data.attributes.email',
            )
        );

        // Execute the CreatePinRequest to the ssb_customer service
        $pin_created = CreatePinRequest::execute(customer: $customer, request: $request);

        // Return the success response if the pin is crated
        if (data_get($pin_created, key: 'status') === true) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: true,
                code: Response::HTTP_ACCEPTED,
                message: 'Request successful.',
                description: 'Congratulations! Your registration is successful.',
            );
        }

        // Return the unsuccessful response
        return ResponseBuilder::resourcesResponseBuilder(
            status: false,
            code: Response::HTTP_ACCEPTED,
            message: 'Request unsuccessful.',
            description: 'Congratulations! Your registration is successful.',
        );
    }
}
