<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Settlement;

use App\Services\Susu\Requests\DailySusu\Settlement\SusuServiceDailySusuAutomatedSettlementRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuAutomatedSettlementAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServiceDailySusuAutomatedSettlementRequest
        return (new SusuServiceDailySusuAutomatedSettlementRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
