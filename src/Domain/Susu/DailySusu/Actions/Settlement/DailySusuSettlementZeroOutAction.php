<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Settlement;

use App\Services\Susu\Requests\DailySusu\Settlement\SusuServiceDailySusuSettlementZeroOutRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuSettlementZeroOutAction
{
    public function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the DailySusuSettlementZeroOutRequest
        return (new SusuServiceDailySusuSettlementZeroOutRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
