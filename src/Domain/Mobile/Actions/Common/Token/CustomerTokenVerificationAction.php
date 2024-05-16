<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Common\Token;

use _PHPStan_6b522806f\Nette\Neon\Exception;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Models\Token;

final class CustomerTokenVerificationAction
{
    public static function execute(Customer $customer, string $token): Token
    {
        // Get the customer token
        $token = Token::where(column: 'customer_id', operator: '=', value: $customer->id)->where(column: 'token', operator: '=', value: $token)->first();

        // Update the token (is_verified) status
        $token->is_verified = true;
        $token->save();

        // Return PasswordResetTokenVerificationException
        if (! $token) {
            throw new Exception;
        }

        return $token;
    }
}
