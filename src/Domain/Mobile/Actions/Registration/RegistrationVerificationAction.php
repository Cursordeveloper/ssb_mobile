<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Mobile\Jobs\Registration\RegistrationVerificationJob;
use Domain\Mobile\Models\Customer;
use Domain\Shared\Exceptions\Registration\SystemFailureExec;
use Illuminate\Support\Str;

final class RegistrationVerificationAction
{
    public static function execute(array $request): Customer
    {
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

        // Return the customer
        return $customer;
    }
}
