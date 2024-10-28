<?php

declare(strict_types=1);

namespace Domain\Mobile\Services\Registration;

use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

final class RegistrationPersonalInformationService
{
    public static function execute(Customer $customer, array $request): bool
    {
        // Update the customer data
        return DB::transaction(function () use ($customer, $request) {
            return $customer->update([
                'first_name' => data_get(target: $request, key: 'data.attributes.first_name'),
                'last_name' => data_get(target: $request, key: 'data.attributes.last_name'),

                'email' => data_get(target: $request, key: 'data.attributes.email'),
                'password' => Hash::make(data_get(target: $request, key: 'data.attributes.password')),

                'accepted_terms' => data_get(target: $request, key: 'data.attributes.accepted_terms'),
                'status' => CustomerStatus::Active->value,
            ]);
        });
    }
}
