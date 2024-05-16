<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Common\Token;

use Domain\Mobile\Models\Customer;
use Domain\Mobile\Models\Token;

final class DeleteTokenAction
{
    public static function execute(Customer $customer): void
    {
        Token::query()->where(column: 'customer_id', operator: '=', value: data_get(target: $customer, key: 'id'))->delete();
    }
}
