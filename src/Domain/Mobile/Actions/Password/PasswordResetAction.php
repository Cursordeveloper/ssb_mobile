<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password;

use Domain\Mobile\Events\Password\PasswordResetEvent;
use Domain\Mobile\Models\Customer;

final class PasswordResetAction
{
    public static function execute(Customer $customer, array $request): Customer
    {
        // Execute the ChangePasswordAction
        UpdatePasswordAction::execute(customer: $customer, request: $request);

        // Dispatch the PasswordResetEvent
        PasswordResetEvent::dispatch($customer);

        // Return the customer
        return $customer;
    }
}
