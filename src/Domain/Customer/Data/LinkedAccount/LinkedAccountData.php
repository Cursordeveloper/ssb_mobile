<?php

declare(strict_types=1);

namespace Domain\Customer\Data\LinkedAccount;

final class LinkedAccountData
{
    public static function toArray(array $request): array
    {
        return [
            'data' => [
                // Resource type and id
                'type' => 'LinkedAccount',

                // Resource exposed attributes
                'attributes' => [
                    'account_number' => data_get(
                        target: $request,
                        key: 'data.attributes.account_number',
                    ),
                ],

                // Relationship data per the request
                'relationships' => [
                    'scheme' => [
                        'type' => 'Scheme',

                        'attributes' => [
                            'resource_id' => data_get(
                                target: $request,
                                key: 'data.relationships.scheme.attributes.resource_id',
                            ),
                        ],
                    ],
                ],
            ],
        ];
    }
}
