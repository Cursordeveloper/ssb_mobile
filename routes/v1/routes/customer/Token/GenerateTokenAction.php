<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Token;

use Carbon\Carbon;
use Domain\Customer\Models\Customer;
use Domain\Customer\Models\Token;

final class GenerateTokenAction
{
    public static function execute(Customer $customer): Token
    {
        return Token::updateOrCreate([
            'customer_id' => data_get(
                target: $customer,
                key: 'id'
            ),
        ], [
            'token' => generateToken(
                table: 'tokens',
                length: 6
            ),
            'token_expiration_date' => Carbon::now()->addDays(),
            'is_verified' => false,
        ])->refresh();
    }
}
