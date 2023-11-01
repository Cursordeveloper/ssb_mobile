<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Common\Token;

use Carbon\Carbon;
use Domain\Mobile\Events\Token\TokenCreatedEvent;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Models\Token;

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
