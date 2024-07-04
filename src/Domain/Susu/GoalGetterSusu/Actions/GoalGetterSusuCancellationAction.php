<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions;

use App\Services\Susu\Requests\GoalGetterSusu\SusuServiceGoalGetterSusuCancellationRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuCancellationAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Send the request and return the response
        return (new SusuServiceGoalGetterSusuCancellationRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
