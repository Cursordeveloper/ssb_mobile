<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Authentication;

use App\Common\Helpers;
use App\Common\ResponseBuilder;
use App\Http\Resources\V1\Mobile\Authentication\AuthenticationResource;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Customer\Services\Registration\CustomerByNumberService;
use Domain\Mobile\Models\Customer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class LoginAction
{
    public static function execute(array $request): JsonResponse
    {
        // Execute the CustomerByNumberService and return Customer
        $customer = CustomerByNumberService::execute(phone_number: data_get(target: $request, key: 'data.attributes.phone_number'));

        return match (true) {
            $customer->has_pin === false => self::hasNoPin(customer: $customer),
            empty($customer->password) => self::hasNoPassword(customer: $customer),

            default => self::customerLogin(request: $request),
        };
    }

    private static function hasNoPin(Customer $customer): JsonResponse
    {
        return ResponseBuilder::resourcesResponseBuilder(
            status: false,
            code: Response::HTTP_PARTIAL_CONTENT,
            message: 'Incomplete registration.',
            description: 'You have not created your Susubox your pin.',
            data: new RegistrationResource(resource: $customer),
        );
    }

    private static function hasNoPassword(Customer $customer): JsonResponse
    {
        return ResponseBuilder::resourcesResponseBuilder(
            status: false,
            code: Response::HTTP_PARTIAL_CONTENT,
            message: 'Incomplete registration.',
            description: 'You have not created your Susubox your pin.',
            data: new RegistrationResource(resource: $customer),
        );
    }

    private static function customerLogin(array $request): JsonResponse
    {
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
