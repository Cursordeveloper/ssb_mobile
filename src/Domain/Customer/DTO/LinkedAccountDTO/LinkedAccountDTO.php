<?php

declare(strict_types=1);

namespace Domain\Customer\DTO\LinkedAccountDTO;

use Domain\Customer\DTO\Registration\CustomerDTO;
use Domain\Customer\Models\Customer;
use Domain\Customer\Models\Token;

final class LinkedAccountDTO
{
    public static function toArray(Customer $customer, array $request): array
    {
        return [
            // Resource type and id
            'type' => 'LinkedAccount',

            // Resource exposed attributes
            'attributes' => [
                'account_number' => data_get(
                    target: $request,
                    key: 'data.attributes.account_number'
                ),
            ],

            // Included data per the request
            'included' => [
                'customer' => CustomerDTO::toArray($customer),
                'scheme' => [
                    'type' => 'Scheme',
                    'attributes' => [
                        'resource_id' => data_get(
                            target: $request,
                            key: 'data.relationships.scheme.attributes.resource_id'
                        )
                    ],
                ],
            ],
        ];
    }
}
