<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Pin;

use Domain\Customer\Services\Registration\CustomerByNumberService;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Services\Registration\RegistrationHasPinUpdateService;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Throwable;

final class RegistrationHasPinUpdateAction
{
    /**
     * @throws SystemFailureExec
     */
    public static function execute(array $request): Customer
    {
        // Execute the CustomerByNumberService and return the Customer
        $customer = CustomerByNumberService::execute(phone_number: data_get(target: $request, key: 'data.attributes.phone_number'));

        try {
            // Execute the RegistrationHasPinUpdateService
            RegistrationHasPinUpdateService::execute(customer: $customer, request: $request);

            // Return the $customer
            return $customer;
        } catch (Throwable $throwable) {
            // Throw the SystemFailureExec
            throw new SystemFailureExec;
        }
    }
}
