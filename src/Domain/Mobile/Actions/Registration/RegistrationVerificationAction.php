<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use App\Common\ResponseBuilder;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Customer\Services\Registration\CustomerCreateService;
use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Jobs\Registration\RegistrationVerificationJob;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Services\Registration\RegistrationVerificationService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationVerificationAction
{
    public static function execute(array $request): JsonResponse
    {
        // Execute the CustomerByNumberService and return Customer
        $customer = RegistrationVerificationService::execute(
            phone_number: data_get(target: $request, key: 'data.attributes.phone_number')
        );

        // Evaluate the $customer and take appropriate action
        return match (true) {
            $customer === null => self::customerCreate(request: $request),
            $customer->status === CustomerStatus::Pending->value || $customer->status === CustomerStatus::Verified->value => self::customerToken(customer: $customer),
            $customer->password === null || empty($customer->password) => self::registrationPassword(customer: $customer),
            $customer->has_pin === false => self::registrationPin(customer: $customer),

            default => self::registeredCustomer(),
        };
    }

    private static function customerCreate(array $request): JsonResponse
    {
        // Create the new customer
        $customer = CustomerCreateService::execute(request: $request);

        // Dispatch RegistrationVerificationJob
        RegistrationVerificationJob::dispatch($customer);

        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Phone number verification in progress. You will be notified shortly.',
            data: new RegistrationResource($customer),
        );
    }

    private static function customerToken(Customer $customer): JsonResponse
    {
        // Update the customer status [pending]
        $customer->update(['status' => CustomerStatus::Pending->value]);

        // Dispatch RegistrationVerificationJob
        RegistrationVerificationJob::dispatch($customer);

        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: true,
            code: Response::HTTP_OK,
            message: 'Request successful.',
            description: 'Phone number verification in progress. You will be notified shortly.',
            data: new RegistrationResource($customer->refresh()),
        );
    }

    private static function registrationPassword(Customer $customer): JsonResponse
    {
        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: false,
            code: Response::HTTP_PARTIAL_CONTENT,
            message: 'Incomplete registration.',
            description: 'You have not created a password for this account.',
            data: new RegistrationResource(resource: $customer)
        );
    }

    private static function registrationPin(Customer $customer): JsonResponse
    {
        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: false,
            code: Response::HTTP_PARTIAL_CONTENT,
            message: 'Incomplete registration.',
            description: 'You have not created your SusuBox PIN for this account.',
            data: new RegistrationResource(resource: $customer)
        );
    }

    private static function registeredCustomer(): JsonResponse
    {
        // Return the resourceResponseBuilder
        return ResponseBuilder::resourcesResponseBuilder(
            status: false,
            code: Response::HTTP_UNPROCESSABLE_ENTITY,
            message: 'Request unprocessable.',
            description: 'The phone number is already taken.'
        );
    }
}
