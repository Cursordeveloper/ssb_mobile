<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Common\Token;

use Carbon\Carbon;
use Domain\Customer\Events\Token\TokenCreatedEvent;
use Domain\Customer\Models\Customer;
use Domain\Customer\Models\Token;

final class GenerateTokenAction
{
    public static function execute(
        Customer $customer,
    ): void {
        // Generate and store the token
        $token_created = Token::updateOrCreate([
            'customer_id' => data_get(
                target: $customer,
                key: 'id',
            ),
        ], [
            'token' => generateToken(
                table: 'tokens',
                length: 6,
            ),
            'token_expiration_date' => Carbon::now()->addDays(),
            'is_verified' => false,
        ])->refresh();

        // Dispatch the TokenCreatedEvent
        TokenCreatedEvent::dispatch(
            $token_created,
        );
    }
}
