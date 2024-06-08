<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions;

use App\Services\Susu\Requests\BizSusu\BizSusuApprovalRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuApprovalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Send the request and return the response
        return (new BizSusuApprovalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
