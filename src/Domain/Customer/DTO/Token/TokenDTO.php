<?php

declare(strict_types=1);

namespace Domain\Customer\DTO\Token;

use Domain\Customer\DTO\Registration\CustomerDTO;
use Domain\Customer\Models\Customer;
use Domain\Customer\Models\Token;

final class TokenDTO
{
    public static function toArray(Customer $customer, Token $token): array
    {
        return [
            'data' => [
                // Resource type and id
                'type' => 'Token',

                // Resource exposed attributes
                'attributes' => [
                    'token' => data_get(target: $token, key: 'token'),
                    'token_expiration_date' => data_get(target: $token, key: 'token_expiration_date'),
                ],

                // Included data per the request
                'included' => [
                    'customer' => [
                        CustomerDTO::toArray($customer)
                    ],
                ],
            ],
        ];
    }
}
