<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Payment;

use App\Services\Susu\Requests\BizSusu\Payment\SusuServiceBizSusuPaymentAmountRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuPaymentAmountAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServiceBizSusuPaymentAmountRequest
        return (new SusuServiceBizSusuPaymentAmountRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
