<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\Payment;

use App\Services\Susu\Requests\FlexySusu\Payment\SusuServiceFlexySusuPaymentCancellationRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuPaymentCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $payment, array $request): array
    {
        // Execute the FlexySusuPaymentCancellationRequest
        return (new SusuServiceFlexySusuPaymentCancellationRequest)->execute(customer: $customer, susu: $susu, payment: $payment, request: $request);
    }
}
