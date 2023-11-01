<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password;

use Domain\Mobile\Actions\Common\Customer\GetCustomerAction;

final class PasswordResetTokenVerification
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

        // Execute PasswordResetTokenVerificationAction
        return PasswordResetTokenVerificationAction::execute(
            customer: $customer
        );
    }
}
