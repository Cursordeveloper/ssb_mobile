<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Common;

use Domain\Customer\Models\Customer;

final class GetCustomerAction
{
    public static function execute(string $resource): Customer
    {
        // Get the customer
        return Customer::where(
            column: 'email',
            operator: '=',
            value: $resource
        )->orWhere(
            column: 'resource_id',
            operator: '=',
            value: $resource
        )->first();
    }
}
