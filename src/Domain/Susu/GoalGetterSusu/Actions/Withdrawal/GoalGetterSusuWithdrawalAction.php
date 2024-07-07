<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Withdrawal;

use App\Services\Susu\Requests\GoalGetterSusu\Withdrawal\SusuServiceGoalGetterSusuWithdrawalRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuWithdrawalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute and return the GoalGetterSusuWithdrawalRequest
        return (new SusuServiceGoalGetterSusuWithdrawalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
