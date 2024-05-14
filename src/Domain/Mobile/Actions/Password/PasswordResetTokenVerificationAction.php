<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password;

use Domain\Mobile\Actions\Common\Token\CustomerTokenVerificationAction;
use Domain\Mobile\Models\Customer;

final class PasswordResetTokenVerificationAction
{
    public static function execute(Customer $customer, array $request): Customer
    {
        // Execute the CustomerTokenVerificationAction
        CustomerTokenVerificationAction::execute(customer: $customer, token: data_get(target: $request, key: 'data.attributes.token'));

        // Return the customer
        return $customer;
    }
}
