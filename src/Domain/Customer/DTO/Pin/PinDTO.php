<?php

declare(strict_types=1);

namespace Domain\Customer\DTO\Pin;

use Domain\Mobile\DTO\Registration\CustomerDTO;
use Domain\Mobile\Models\Customer;

final class PinDTO
{
    public static function toArray(
        Customer $customer,
        array $request,
    ): array {
        return [
            // Resource type and id
            'type' => 'Pin',

            // Resource exposed attributes
            'attributes' => [
                'pin' => data_get(target: $request, key: 'data.attributes.pin'),
            ],

            // Included data per the request
            'included' => [
                'customer' => CustomerDTO::toArray($customer),
            ],
        ];
    }
}
