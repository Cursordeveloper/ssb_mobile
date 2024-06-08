<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\Payment;

use App\Services\Susu\Requests\FlexySusu\Payment\FlexySusuPaymentApprovalRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuPaymentApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $payment, array $request): array
    {
        // Execute the FlexySusuCreateRequest
        return (new FlexySusuPaymentApprovalRequest)->execute(customer: $customer, susu: $susu, payment: $payment, request: $request);
    }
}
