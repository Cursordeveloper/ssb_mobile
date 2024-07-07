<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\LinkedAccounts;

use App\Services\Customer\Requests\LinkedAccount\CustomerServiceLinkNewAccountApprovalRequest;
use Domain\Mobile\Models\Customer;

final class LinkAccountApprovalAction
{
    public static function execute(Customer $customer, string $linked_account, array $request): array
    {
        // Post and return the http request
        return (new CustomerServiceLinkNewAccountApprovalRequest)->execute(customer: $customer, linked_account: $linked_account, request: $request);
    }
}
