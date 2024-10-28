<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password;

use Domain\Customer\Services\Registration\CustomerByNumberService;
use Domain\Mobile\Actions\Common\Token\GenerateTokenAction;
use Domain\Mobile\Events\Password\PasswordResetRequestEvent;
use Domain\Mobile\Models\Customer;

final class PasswordResetRequestAction
{
    public static function execute(array $request): Customer
    {
        // Execute the CustomerByNumberService and return Customer
        $customer = CustomerByNumberService::execute(
            phone_number: data_get(target: $request, key: 'data.attributes.phone_number')
        );

        // Execute the GenerateTokenAction
        $token = GenerateTokenAction::execute(customer: $customer);

        // Dispatch token created event
        PasswordResetRequestEvent::dispatch($customer, $token);

        // Return the customer
        return $customer;
    }
}
