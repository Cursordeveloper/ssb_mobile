<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\LinkedAccounts;

use App\Services\Customer\Requests\LinkedAccount\LinkedAccountsRequest;
use Domain\Mobile\Models\Customer;

final class LinkedAccountsAction
{
    public static function execute(Customer $customer): array
    {
        // Send and return the http request
        return (new LinkedAccountsRequest)->execute(customer: $customer);
    }
}
