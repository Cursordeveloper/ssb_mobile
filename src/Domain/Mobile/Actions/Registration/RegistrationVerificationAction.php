<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use App\Common\ResponseBuilder;
use App\Http\Resources\V1\Mobile\Registration\RegistrationResource;
use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Jobs\Registration\RegistrationVerificationJob;
use Domain\Mobile\Models\Customer;
use Domain\Shared\Exceptions\Registration\SystemFailureExec;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class RegistrationVerificationAction
{
    public static function execute(array $request): JsonResponse
    {
        // Get the customer
        $customer = Customer::where(column: 'phone_number', operator: '=', value: data_get(target: $request, key: 'data.attributes.phone_number'))->first();

        // Return the [Incomplete registration] if customer has no password
        if (! empty($customer) && empty($customer->password)) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: false,
                code: Response::HTTP_PARTIAL_CONTENT,
                message: 'Incomplete registration.',
                description: 'You have not created a password for this account.',
                data: new RegistrationResource(resource: $customer),
            );
        }

        // Return the [Incomplete registration] response if phone is used
        if (! empty($customer) && $customer->status === CustomerStatus::Active->value) {
            return ResponseBuilder::resourcesResponseBuilder(
                status: false,
                code: Response::HTTP_UNPROCESSABLE_ENTITY,
                message: 'Request unprocessable.',
                description: 'The phone number is already taken.',
            );
        }

        // Create the new customer
        $customer = Customer::create([
            'resource_id' => Str::uuid()->toString(),
            'phone_number' => data_get(target: $request, key: 'data.attributes.phone_number'),
        ]);

        // Return RegistrationVerificationExc
        if (! $customer) {
            throw new SystemFailureExec;
        }

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
}
