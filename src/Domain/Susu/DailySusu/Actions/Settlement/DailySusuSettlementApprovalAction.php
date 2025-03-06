<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Settlement;

use App\Services\Susu\Requests\DailySusu\Settlement\SusuServiceDailySusuSettlementApprovalRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuSettlementApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $settlement, array $request): array
    {
        // Execute the DailySusuSettlementRequest
        return (new SusuServiceDailySusuSettlementApprovalRequest)->execute(customer: $customer, susu: $susu, settlement: $settlement, request: $request);
    }
}
