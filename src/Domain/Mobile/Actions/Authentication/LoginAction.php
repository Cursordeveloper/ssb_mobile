<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Authentication;

use App\Common\Helpers;
use App\Common\ResponseBuilder;
use App\Http\Resources\V1\Mobile\Authentication\AuthenticationResource;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Actions\Common\Customer\CustomerGetAction;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class LoginAction
{
    public static function execute(array $request): JsonResponse
    {
        // Get the customer
        $customer = CustomerGetAction::execute(resource: data_get(target: $request, key: 'data.attributes.phone_number'));

        // Return the customer complete registration
        if (empty($customer->password)) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: false,
                code: Response::HTTP_PARTIAL_CONTENT,
                message: 'Incomplete registration.',
                description: 'You have not created a password for this account.',
                data: new RegistrationResource(resource: $customer),
            );
        }

        // Return the customer has no pin
        if ($customer->has_pin === false) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: false,
                code: Response::HTTP_PARTIAL_CONTENT,
                message: 'Incomplete registration.',
                description: 'You have not created your Susubox your pin.',
                data: new RegistrationResource(resource: $customer),
            );
        }

        // Attempt login
        $token = auth()
            ->guard(name: 'customer')
            ->attempt(data_get(target: $request, key: 'data.attributes'));

        // Login status conditional
        if (! $token) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: false,
                code: Response::HTTP_UNAUTHORIZED,
                message: 'Authentication failed.',
                description: 'Incorrect phone number or password.',
            );
        }

        // Return the login success response
        return ResponseBuilder::tokenResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Login successful.',
            token: Helpers::respondWithToken($token)->original,
            user: new AuthenticationResource(auth()->guard(name: 'customer')->user()),
        );
    }
}
