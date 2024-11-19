<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Settlement;

use App\Services\Susu\Requests\PersonalSusu\Settlement\SusuServicePersonalSusuAutomatedSettlementRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuAutomatedSettlementAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServicePersonalSusuAutomatedSettlementRequest
        return (new SusuServicePersonalSusuAutomatedSettlementRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
