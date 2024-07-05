<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Settlement;

use App\Services\Susu\Requests\PersonalSusu\Settlement\SusuServicePersonalSusuSettlementCancellationRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuSettlementCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $settlement, array $request): array
    {
        // Execute the SusuServicePersonalSusuSettlementCancellationRequest
        return (new SusuServicePersonalSusuSettlementCancellationRequest)->execute(customer: $customer, susu: $susu, settlement: $settlement, request: $request);
    }
}
