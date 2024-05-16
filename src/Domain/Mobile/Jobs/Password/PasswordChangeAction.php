<?php

declare(strict_types=1);

namespace Domain\Mobile\Jobs\Password;

use Domain\Mobile\Actions\Password\UpdatePasswordAction;
use Domain\Mobile\Events\Password\PasswordChangeEvent;
use Domain\Mobile\Models\Customer;

final class PasswordChangeAction
{
    public static function execute(Customer $customer, array $request): bool
    {
        // Execute the UpdatePasswordAction
        $password_reset = UpdatePasswordAction::execute(customer: $customer, request: $request);

        // Return the PasswordChangeException
        if (! $password_reset) {
            logger();
        }

        // Dispatch the PasswordChangeEvent
        PasswordChangeEvent::dispatch($customer);

        // Return bool
        return true;
    }
}
