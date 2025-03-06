<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Payment;

use App\Services\Susu\Requests\DailySusu\Payment\SusuServiceDailySusuPaymentCancellationRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuPaymentCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $payment, array $request): array
    {
        // Execute the DailySusuPaymentCancellationRequest
        return (new SusuServiceDailySusuPaymentCancellationRequest)->execute(customer: $customer, susu: $susu, payment: $payment, request: $request);
    }
}
