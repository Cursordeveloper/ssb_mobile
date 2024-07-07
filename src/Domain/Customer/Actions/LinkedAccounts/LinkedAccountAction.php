<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\LinkedAccounts;

use App\Services\Customer\Requests\LinkedAccount\CustomerServiceLinkedAccountRequest;
use Domain\Mobile\Models\Customer;

final class LinkedAccountAction
{
    public static function execute(Customer $customer, string $linked_account): array
    {
        // Send and return the http request
        return (new CustomerServiceLinkedAccountRequest)->execute(customer: $customer, linked_account: $linked_account);
    }
}
