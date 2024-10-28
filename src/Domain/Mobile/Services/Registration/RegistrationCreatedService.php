<?php

declare(strict_types=1);

namespace Domain\Mobile\Services\Registration;

use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\DB;

final class RegistrationCreatedService
{
    public static function execute(array $data): bool
    {
        // Update the customer email
        return DB::transaction(function () use ($data) {
            return Customer::query()->updateOrCreate(
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
        });
    }
}
