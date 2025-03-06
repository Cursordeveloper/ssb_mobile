<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Payment;

use App\Services\Susu\Requests\DailySusu\Payment\SusuServiceDailySusuPaymentRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuPaymentAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the DailySusuCreateRequest
        return (new SusuServiceDailySusuPaymentRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
