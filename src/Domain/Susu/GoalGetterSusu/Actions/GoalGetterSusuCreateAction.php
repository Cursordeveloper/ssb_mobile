<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions;

use App\Services\Susu\Requests\GoalGetterSusu\GoalGetterSusuCreateRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuCreateAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Execute the GoalGetterSusuCreateRequest
        return (new GoalGetterSusuCreateRequest)->execute(customer: $customer, request: $request);
    }
}
