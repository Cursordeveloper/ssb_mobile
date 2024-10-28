<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Mobile\Registration;

use App\Common\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Mobile\Registration\RegistrationPasswordCreationRequest;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Actions\Registration\RegistrationPasswordCreationAction;
use Domain\Mobile\Models\Customer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationPasswordCreationController extends Controller
{
    public function __invoke(Customer $customer, RegistrationPasswordCreationRequest $request): JsonResponse
    {
        // Execute the RegistrationPasswordCreationAction and return the Customer
        $customer = RegistrationPasswordCreationAction::execute(customer: $customer, request: $request->validated());

        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Registration in progress. You will be notified shortly.',
            data: new RegistrationResource($customer),
        );
    }
}
