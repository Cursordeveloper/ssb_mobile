<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Payment;

use App\Services\Susu\Requests\DailySusu\Payment\SusuServiceDailySusuPaymentApprovalRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuPaymentApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $payment, array $request): array
    {
        // Execute the DailySusuCreateRequest
        return (new SusuServiceDailySusuPaymentApprovalRequest)->execute(customer: $customer, susu: $susu, payment: $payment, request: $request);
    }
}
