<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Payment;

use App\Services\Susu\Requests\PersonalSusu\Payment\PersonalSusuPaymentApprovalRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuPaymentApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $payment, array $request): array
    {
        // Execute the PersonalSusuCreateRequest
        return (new PersonalSusuPaymentApprovalRequest)->execute(customer: $customer, susu: $susu, payment: $payment, request: $request);
    }
}
