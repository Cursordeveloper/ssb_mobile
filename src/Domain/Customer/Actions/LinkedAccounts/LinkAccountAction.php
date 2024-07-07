<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\LinkedAccounts;

use App\Services\Customer\Requests\LinkedAccount\CustomerServiceLinkNewAccountRequest;
use Domain\Customer\Data\LinkedAccount\LinkedAccountData;
use Domain\Mobile\Models\Customer;

final class LinkAccountAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Post and return the http request
        return (new CustomerServiceLinkNewAccountRequest)->execute(customer: $customer, request: LinkedAccountData::toArray(request: $request));
    }
}
