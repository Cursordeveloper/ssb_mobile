<?php

declare(strict_types=1);

namespace Domain\Mobile\Services\Registration;

use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

final class RegistrationPasswordCreationService
{
    public static function execute(Customer $customer, array $request): bool
    {
        // Update the customer email
        return DB::transaction(function () use ($customer, $request) {
            return $customer->update([
                'email' => data_get(target: $request, key: 'data.attributes.email', default: $customer->email),
                'password' => Hash::make(data_get(target: $request, key: 'data.attributes.password')),
            ]);
        });
    }
}
