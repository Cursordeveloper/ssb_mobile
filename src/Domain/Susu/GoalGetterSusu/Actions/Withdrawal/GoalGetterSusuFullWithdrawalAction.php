<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Withdrawal;

use App\Services\Susu\Requests\GoalGetterSusu\Withdrawal\SusuServiceGoalGetterSusuFullWithdrawalRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuFullWithdrawalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute and return the GoalGetterSusuWithdrawalRequest
        return (new SusuServiceGoalGetterSusuFullWithdrawalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
