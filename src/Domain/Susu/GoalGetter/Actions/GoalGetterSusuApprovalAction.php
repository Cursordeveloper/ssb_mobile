<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetter\Actions;

use App\Services\Susu\Requests\GoalGetterSusu\GoalGetterSusuApprovalRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuApprovalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Send the request and return the response
        return (new GoalGetterSusuApprovalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
