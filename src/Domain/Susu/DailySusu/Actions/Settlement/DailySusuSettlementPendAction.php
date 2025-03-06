<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Settlement;

use App\Services\Susu\Requests\DailySusu\Settlement\SusuServiceDailySusuSettlementPendRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuSettlementPendAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the DailySusuSettlementPendRequest
        return (new SusuServiceDailySusuSettlementPendRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
