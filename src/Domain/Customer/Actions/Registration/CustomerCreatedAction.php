<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Registration;

use Domain\Mobile\Models\Customer;

final class CustomerCreatedAction
{
    public static function execute(array $data): bool
    {
        // Create the Customer
        $create_customer = Customer::query()->updateOrCreate(
            ['phone_number' => data_get(target: $data, key: 'data.attributes.phone_number')],
            [
                'resource_id' => data_get(target: $data, key: 'data.attributes.resource_id'),
                'first_name' => data_get(target: $data, key: 'data.attributes.first_name'),
                'last_name' => data_get(target: $data, key: 'data.attributes.last_name'),
                'phone_number' => data_get(target: $data, key: 'data.attributes.phone_number'),
                'email' => data_get(target: $data, key: 'data.attributes.email'),
                'accepted_terms' => data_get(target: $data, key: 'data.attributes.accepted_terms'),
                'status' => data_get(target: $data, key: 'data.attributes.status'),
            ]
        );

        return (bool) $create_customer;
    }
}
