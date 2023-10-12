<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Password;

use App\Jobs\Customer\Password\PasswordResetConfirmationEvent;
use Domain\Customer\Actions\Common\GetCustomerAction;
use Domain\Customer\Actions\Common\Token\DeleteTokenAction;
use Domain\Customer\DTO\Registration\CustomerDTO;

final class PasswordReset
{
    public static function execute(array $request): bool
    {
        // Get the customer
        $customer = GetCustomerAction::execute(
            resource: data_get(
                target: $request,
                key: 'data.attributes.email'
            )
        );

        // Execute the ChangePasswordAction
        $password_reset = UpdatePasswordAction::execute(
            customer: $customer,
            request: $request
        );

        if ($password_reset) {
            // Delete the token
            DeleteTokenAction::execute(
                customer: $customer
            );

            // Publish to the notification service
            PasswordResetConfirmationEvent::dispatch(
                CustomerDTO::toArray(
                    customer: $customer,
                )
            );
            return true;
        }

        return false;
    }
}
