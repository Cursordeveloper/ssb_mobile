<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Settlement;

use App\Services\Susu\Requests\DailySusu\Settlement\SusuServiceDailySusuSettlementCancellationRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuSettlementCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $settlement, array $request): array
    {
        // Execute the SusuServiceDailySusuSettlementCancellationRequest
        return (new SusuServiceDailySusuSettlementCancellationRequest)->execute(customer: $customer, susu: $susu, settlement: $settlement, request: $request);
    }
}
