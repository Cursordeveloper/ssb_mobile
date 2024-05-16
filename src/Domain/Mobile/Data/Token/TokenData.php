<?php

declare(strict_types=1);

namespace Domain\Mobile\Data\Token;

use Domain\Mobile\Data\Registration\CustomerData;
use Domain\Mobile\Models\Token;

final class TokenData
{
    public static function toArray(Token $token): array
    {
        return [
            'data' => [
                // Resource type and id
                'type' => 'Token',

                // Resource exposed attributes
                'attributes' => [
                    'resource_id' => data_get(target: $token, key: 'resource_id'),
                    'token' => data_get(target: $token, key: 'token'),
                    'token_expiration_date' => data_get(target: $token, key: 'token_expiration_date'),
                ],

                // Included data per the request
                'included' => [
                    'customer' => CustomerData::toArray($token->load(relations: 'customer')['customer'])['data'],
                ],
            ],
        ];
    }
}
