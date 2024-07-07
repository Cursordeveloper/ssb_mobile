<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetterSusu\Actions\Payment;

use App\Services\Susu\Requests\GoalGetterSusu\Payment\SusuServiceGoalGetterSusuPaymentCancellationRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuPaymentCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $payment, array $request): array
    {
        // Execute the GoalGetterSusuPaymentCancellationRequest
        return (new SusuServiceGoalGetterSusuPaymentCancellationRequest)->execute(customer: $customer, susu: $susu, payment: $payment, request: $request);
    }
}
