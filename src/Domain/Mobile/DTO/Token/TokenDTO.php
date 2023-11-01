<?php

declare(strict_types=1);

namespace Domain\Mobile\DTO\Token;

use Domain\Mobile\DTO\Registration\CustomerDTO;
use Domain\Mobile\Models\Token;

final class TokenDTO
{
    public static function toArray(
        Token $token,
    ): array {
        return [
            // Resource type and id
            'type' => 'Token',

            // Resource exposed attributes
            'attributes' => [
                'resource_id' => data_get(
                    target: $token,
                    key: 'resource_id'
                ),
                'token' => data_get(
                    target: $token,
                    key: 'token'
                ),
                'token_expiration_date' => data_get(
                    target: $token,
                    key: 'token_expiration_date'
                ),
            ],

            // Included data per the request
            'included' => [
                'customer' => CustomerDTO::toArray(
                    $token->load(relations: 'customer')['customer'],
                ),
            ],
        ];
    }
}
