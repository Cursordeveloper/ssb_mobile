<?php

declare(strict_types=1);

namespace Domain\Customer\Data\Pin;

use Domain\Mobile\Data\Registration\CustomerData;
use Domain\Mobile\Models\Customer;

final class PinData
{
    public static function toArray(Customer $customer, array $request): array
    {
        return [
            // Resource type and id
            'type' => 'Pin',

            // Resource exposed attributes
            'attributes' => [
                'pin' => data_get(target: $request, key: 'data.attributes.pin'),
            ],

            // Relationship data per the request
            'relationships' => [
                'customer' => CustomerData::toArray($customer),
            ],
        ];
    }
}
