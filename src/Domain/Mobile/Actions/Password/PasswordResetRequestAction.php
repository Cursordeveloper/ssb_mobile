<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password;

use Domain\Mobile\Actions\Common\Customer\CustomerGetAction;
use Domain\Mobile\Actions\Common\Token\GenerateTokenAction;
use Domain\Mobile\Events\Password\PasswordResetRequestEvent;
use Domain\Mobile\Models\Customer;

final class PasswordResetRequestAction
{
    public static function execute(array $request): Customer
    {
        // Execute the CustomerGetAction
        $customer = CustomerGetAction::execute(resource: data_get(target: $request, key: 'data.attributes.phone_number'));

        // Execute the GenerateTokenAction
        $token = GenerateTokenAction::execute(customer: $customer);

        // Dispatch token created event
        PasswordResetRequestEvent::dispatch($customer, $token);

        // Return the customer
        return $customer;
    }
}
