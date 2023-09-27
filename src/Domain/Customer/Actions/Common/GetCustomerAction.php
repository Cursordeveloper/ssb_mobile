<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Common;

use Domain\Customer\Models\Customer;

final class GetCustomerAction
{
    public static function execute(array $request): Customer
    {
        // Get the customer
        return Customer::where(
            column: 'email',
            operator: '=',
            value: data_get(
                target: $request,
                key: 'data.attributes.email'
            )
        )->orWhere(
            column: 'resource_id',
            operator: '=',
            value: data_get(
                target: $request,
                key: 'data.attributes.resource_id'
            )
        )->first();
    }
}
