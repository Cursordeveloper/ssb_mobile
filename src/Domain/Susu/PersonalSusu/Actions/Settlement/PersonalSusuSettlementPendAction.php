<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Settlement;

use App\Services\Susu\Requests\PersonalSusu\Settlement\SusuServicePersonalSusuSettlementPendRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuSettlementPendAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the PersonalSusuSettlementPendRequest
        return (new SusuServicePersonalSusuSettlementPendRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
