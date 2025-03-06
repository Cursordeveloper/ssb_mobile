<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Susu;

use App\Services\Susu\Requests\DailySusu\Account\SusuServiceDailySusuApprovalRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuApprovalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Send the request and return the response
        return (new SusuServiceDailySusuApprovalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
