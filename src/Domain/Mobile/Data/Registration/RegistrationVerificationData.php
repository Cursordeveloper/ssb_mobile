<?php

declare(strict_types=1);

namespace Domain\Mobile\Data\Registration;

use Domain\Mobile\Models\Customer;
use Domain\Mobile\Models\Token;

final class RegistrationVerificationData
{
    public static function toArray(Customer $customer, Token $token): array
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

                // Relationship data per the request
                'relationships' => [
                    'customer' => [
                        'type' => 'Customer',
                        'attributes' => [
                            'phone_number' => $customer->phone_number,
                            'email' => $customer->email,
                        ],
                    ],
                ],
            ],
        ];
    }
}
