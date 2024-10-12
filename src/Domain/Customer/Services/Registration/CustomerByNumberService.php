<?php

declare(strict_types=1);

namespace Domain\Customer\Services\Registration;

use Domain\Mobile\Models\Customer;
use Domain\Shared\Exceptions\Registration\SystemFailureExec;

final class CustomerByNumberService
{
    /**
     * @throws SystemFailureExec
     */
    public static function execute(array $request): ?Customer
    {
        return Customer::where(column: 'phone_number', operator: '=', value: data_get(target: $request, key: 'data.attributes.phone_number'))
            ->first();
    }
}
