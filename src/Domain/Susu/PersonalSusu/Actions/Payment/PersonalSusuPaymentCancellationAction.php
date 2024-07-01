<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Payment;

use App\Services\Susu\Requests\PersonalSusu\Payment\PersonalSusuPaymentCancellationRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuPaymentCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $payment, array $request): array
    {
        // Execute the PersonalSusuPaymentCancellationRequest
        return (new PersonalSusuPaymentCancellationRequest)->execute(customer: $customer, susu: $susu, payment: $payment, request: $request);
    }
}
