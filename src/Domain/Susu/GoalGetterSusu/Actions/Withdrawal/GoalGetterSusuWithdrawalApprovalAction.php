<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Withdrawal;

use App\Services\Susu\Requests\GoalGetterSusu\Withdrawal\SusuServiceGoalGetterSusuWithdrawalApprovalRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuWithdrawalApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $withdrawal, array $request): array
    {
        // Execute and return the GoalGetterSusuCreateRequest
        return (new SusuServiceGoalGetterSusuWithdrawalApprovalRequest)->execute(customer: $customer, susu: $susu, withdrawal: $withdrawal, request: $request);
    }
}
