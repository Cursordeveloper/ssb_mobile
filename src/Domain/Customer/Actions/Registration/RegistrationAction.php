<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Registration;

use Domain\Customer\Models\Customer;

final class RegistrationAction
{
    public static function execute(
        array $request
    ): Customer {
        // Create the customer
        $customer = new Customer(
            data_get(
                target: $request,
                key: 'data.attributes'
            )
        );
        $customer->save();

        return $customer->refresh();
    }
}
