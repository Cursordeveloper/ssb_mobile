<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Settlement;

use App\Services\Susu\Requests\DailySusu\Settlement\SusuServiceDailySusuSettlementRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuSettlementAction
{
    public function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the DailySusuCreateRequest
        return (new SusuServiceDailySusuSettlementRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
