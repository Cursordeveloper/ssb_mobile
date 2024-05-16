<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Common\Customer;

use Domain\Mobile\Models\Customer;
use Hoa\Exception\Exception;

final class CustomerGetAction
{
    public static function execute(string $resource): Customer
    {
        // Get the customer
        $customer = Customer::where(column: 'phone_number', operator: '=', value: $resource)->first();

        // Throw the CustomerGetExc (If $customer failed)
        if (! $customer) {
            throw new Exception(message: 'Cannot find the customer');
        }

        // Return the customer
        return $customer;
    }
}
