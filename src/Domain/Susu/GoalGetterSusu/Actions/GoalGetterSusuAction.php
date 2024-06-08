<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions;

use App\Services\Susu\Requests\GoalGetterSusu\GoalGetterSusuRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the GoalGetterSusuCreateRequest
        return (new GoalGetterSusuRequest)->execute(customer: $customer, susu: $susu);
    }
}
