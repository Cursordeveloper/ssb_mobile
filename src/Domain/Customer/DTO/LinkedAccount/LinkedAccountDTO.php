<?php

declare(strict_types=1);

namespace Domain\Customer\DTO\LinkedAccount;

final class LinkedAccountDTO
{
    public static function toArray(array $request): array
    {
        return [
            // Resource type and id
            'type' => 'LinkedAccount',

            // Resource exposed attributes
            'attributes' => [
                'account_number' => data_get(
                    target: $request,
                    key: 'data.attributes.account_number',
                ),
            ],

            // Included data per the request
            'included' => [
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
        ];
    }
}
