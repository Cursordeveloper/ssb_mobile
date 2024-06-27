<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Settlement;

use App\Services\Susu\Requests\PersonalSusu\Settlement\PersonalSusuSettlementRequest;
use App\Services\Susu\Requests\PersonalSusu\Settlement\PersonalSusuSettlementZeroOutRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuSettlementZeroOutAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the PersonalSusuSettlementZeroOutRequest
        return (new PersonalSusuSettlementZeroOutRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
