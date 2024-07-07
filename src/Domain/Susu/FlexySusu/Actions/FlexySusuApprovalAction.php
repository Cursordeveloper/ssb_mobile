<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions;

use App\Services\Susu\Requests\FlexySusu\SusuServiceFlexySusuApprovalRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuApprovalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Send the request and return the response
        return (new SusuServiceFlexySusuApprovalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
