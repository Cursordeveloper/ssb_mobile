<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Payment;

use App\Services\Susu\Requests\GoalGetterSusu\Payment\SusuServiceGoalGetterSusuPaymentRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuPaymentAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the GoalGetterSusuCreateRequest
        return (new SusuServiceGoalGetterSusuPaymentRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
