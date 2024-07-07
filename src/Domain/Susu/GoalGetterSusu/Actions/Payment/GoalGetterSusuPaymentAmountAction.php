<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Payment;

use App\Services\Susu\Requests\GoalGetterSusu\Payment\SusuServiceGoalGetterSusuPaymentAmountRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuPaymentAmountAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServiceGoalGetterSusuPaymentAmountRequest
        return (new SusuServiceGoalGetterSusuPaymentAmountRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
