<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Customer\Services\Registration\CustomerByNumberService;
use Domain\Mobile\Jobs\Registration\RegistrationVerificationJob;
use Domain\Mobile\Models\Customer;

final class RegistrationNewTokenAction
{
    public static function execute(array $request): Customer
    {
        // Execute the CustomerByNumberService and return Customer
        $customer = CustomerByNumberService::execute(
            phone_number: data_get(target: $request, key: 'data.attributes.phone_number')
        );

        // Dispatch RegistrationVerificationJob
        RegistrationVerificationJob::dispatch($customer);

        // Return the customer
        return $customer;
    }
}
