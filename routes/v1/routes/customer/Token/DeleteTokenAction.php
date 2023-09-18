<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Token;

use Domain\Customer\Models\Customer;
use Domain\Customer\Models\Token;

final class DeleteTokenAction
{
    public static function execute(
        Customer $customer
    ): void {
        Token::query()->where(
            column: 'customer_id',
            operator: '=',
            value: data_get(
                target: $customer,
                key: 'id'
            )
        )->delete();
    }
}
