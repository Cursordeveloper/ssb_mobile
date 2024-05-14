<?php

declare(strict_types=1);

namespace Domain\Susu\Personal\Actions;

use App\Services\Susu\Requests\PersonalSusu\PersonalSusuApprovalRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuApprovalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Send the request and return the response
        return (new PersonalSusuApprovalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
