<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Common\Token;

use App\Common\Helpers;
use Carbon\Carbon;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Models\Token;

final class GenerateTokenAction
{
    public static function execute(Customer $customer): Token
    {
        // Generate and store the token
        return Token::updateOrCreate([
            'customer_id' => data_get(target: $customer, key: 'id'),
        ], [
            'token' => Helpers::generateToken(table: 'tokens', length: 6),
            'token_expiration_date' => Carbon::now()->addHour(),
            'is_verified' => false,
        ])->refresh();
    }
}
