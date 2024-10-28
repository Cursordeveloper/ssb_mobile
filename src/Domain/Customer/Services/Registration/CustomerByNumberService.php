<?php

declare(strict_types=1);

namespace Domain\Customer\Services\Registration;

use Domain\Mobile\Models\Customer;
use Domain\Shared\Exceptions\Registration\SystemFailureExec;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class CustomerByNumberService
{
    /**
     * @throws SystemFailureExec
     */
    public static function execute(string $phone_number): ?Customer
    {
        // Get the customer
        $customer = Customer::where(column: 'phone_number', operator: '=', value: $phone_number)->first();

        // Throw the CustomerGetExc (If $customer failed)
        if (! $customer) {
            throw new ModelNotFoundException;
        }

        // Return the customer
        return $customer;
    }
}
