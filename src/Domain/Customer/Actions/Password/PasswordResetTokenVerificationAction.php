<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Password;

use Domain\Customer\Models\Customer;
use Domain\Customer\Models\Token;

final class PasswordResetTokenVerificationAction
{
    public static function execute(Customer $customer): bool
    {
        $token = Token::query()->where(
            column: 'customer_id',
            operator: '=',
            value: data_get(
                target: $customer,
                key: 'id'
            )
        )->first();

        $token->is_verified = true;
        return $token->save();
    }
}
