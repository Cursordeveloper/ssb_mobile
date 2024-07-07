<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Payment;

use App\Services\Susu\Requests\BizSusu\Payment\SusuServiceBizSusuPaymentRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuPaymentAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the BizSusuCreateRequest
        return (new SusuServiceBizSusuPaymentRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
