<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Settlement;

use App\Services\Susu\Requests\PersonalSusu\Settlement\PersonalSusuSettlementRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuSettlementAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the PersonalSusuCreateRequest
        return (new PersonalSusuSettlementRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
