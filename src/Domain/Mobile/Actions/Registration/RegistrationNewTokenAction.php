<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Mobile\Actions\Common\Customer\CustomerGetAction;
use Domain\Mobile\Jobs\Registration\RegistrationVerificationJob;
use Domain\Mobile\Models\Customer;

final class RegistrationNewTokenAction
{
    public static function execute(array $request): Customer
    {
        // Get the customer
        $customer = CustomerGetAction::execute(resource: data_get(target: $request, key: 'data.attributes.phone_number'));

        // Dispatch RegistrationVerificationJob
        RegistrationVerificationJob::dispatch($customer);

        // Return the customer
        return $customer;
    }
}
