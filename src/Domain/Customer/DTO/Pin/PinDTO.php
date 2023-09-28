<?php

declare(strict_types=1);

namespace Domain\Customer\DTO\Pin;

use Domain\Customer\DTO\Registration\CustomerDTO;
use Domain\Customer\Models\Customer;

final class PinDTO
{
    public static function toArray(Customer $customer, array $request): array
    {
        return [
            'data' => [
                // Resource type and id
                'type' => 'Pin',

                // Resource exposed attributes
                'attributes' => [
                    'pin' => data_get(target: $request, key: 'data.attributes.pin'),
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
