<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Mobile\Actions\Common\Customer\GetCustomerAction;
use Domain\Mobile\Actions\Common\Token\GenerateTokenAction;
use Domain\Mobile\Models\Customer;

final class RegistrationTokenAction
{
    public static function execute(
        array $request
    ): Customer {
        // Get the customer
        $customer = GetCustomerAction::execute(
            resource: data_get(
                target: $request,
                key: 'data.attributes.email',
            ),
        );

        // Generate the token
        GenerateTokenAction::execute(
            customer: $customer,
        );

        return $customer->refresh();
    }
}
