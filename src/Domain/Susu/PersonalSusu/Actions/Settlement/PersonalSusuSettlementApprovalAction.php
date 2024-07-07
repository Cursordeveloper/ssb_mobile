<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Settlement;

use App\Services\Susu\Requests\PersonalSusu\Settlement\SusuServicePersonalSusuSettlementApprovalRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuSettlementApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $settlement, array $request): array
    {
        // Execute the PersonalSusuSettlementRequest
        return (new SusuServicePersonalSusuSettlementApprovalRequest)->execute(customer: $customer, susu: $susu, settlement: $settlement, request: $request);
    }
}
