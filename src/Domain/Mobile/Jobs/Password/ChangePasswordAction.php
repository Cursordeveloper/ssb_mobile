<?php

declare(strict_types=1);

namespace Domain\Mobile\Jobs\Password;

use Domain\Mobile\Actions\Common\Customer\GetCustomerAction;
use Domain\Mobile\Actions\Password\UpdatePasswordAction;
use Domain\Mobile\DTO\Registration\CustomerDTO;
use Domain\Mobile\Events\Password\ChangePasswordConfirmationEvent;

final class ChangePasswordAction
{
    public static function execute(
        array $request,
    ): bool {
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
