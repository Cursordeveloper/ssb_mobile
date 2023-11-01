<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Password;

use Domain\Mobile\Models\Customer;
use Domain\Mobile\Models\Token;

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
