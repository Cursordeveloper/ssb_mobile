<?php

declare(strict_types=1);

namespace Domain\Mobile\Services\Registration;

use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\DB;

final class RegistrationHasPinUpdateService
{
    public static function execute(Customer $customer, array $request): bool
    {
        // Update the customer email
        return DB::transaction(function () use ($customer, $request) {
            return $customer->update([
                'resource_id' => data_get(target: $request, key: 'data.attributes.resource_id'),
                'has_pin' => true,
            ]);
        });
    }
}
