<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password;

use Domain\Mobile\Actions\Common\Customer\GetCustomerAction;
use Domain\Mobile\Actions\Common\Token\DeleteTokenAction;
use Domain\Mobile\Events\Password\PasswordResetConfirmationEvent;

final class PasswordResetAction
{
    public static function execute(
        array $request,
    ): void {
        // Execute the GetCustomerAction
        $customer = GetCustomerAction::execute(
            resource: data_get(
                target: $request,
                key: 'data.attributes.email',
            ),
        );

        // Execute the ChangePasswordAction
        $password_reset = UpdatePasswordAction::execute(
            customer: $customer,
            request: $request,
        );

        // Delete the token
        if ($password_reset) {
            DeleteTokenAction::execute(
                customer: $customer
            );
        }

        // Publish to the notification service
        PasswordResetConfirmationEvent::dispatch($customer);
    }
}
