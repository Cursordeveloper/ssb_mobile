<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Password;

use App\Jobs\Customer\Password\ChangePasswordConfirmationEvent;
use Domain\Customer\Actions\Common\GetCustomerAction;
use Domain\Customer\Actions\Password\UpdatePasswordAction;
use Domain\Customer\DTO\Registration\CustomerDTO;

final class ChangePassword
{
    public static function execute(array $request): bool
    {
        // Get the customer
        $customer = GetCustomerAction::execute(
            auth()->user()['email']
        );

        // Execute the ChangePasswordAction
        $password_reset = UpdatePasswordAction::execute(
            customer: $customer,
            request: $request
        );

        if ($password_reset) {
            ChangePasswordConfirmationEvent::dispatch(
                CustomerDTO::toArray(
                    customer: $customer
                )
            );
            return true;
        }

        return false;
    }
}
