<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Payment;

use App\Services\Susu\Requests\PersonalSusu\Payment\SusuServicePersonalSusuPaymentRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuPaymentAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the PersonalSusuCreateRequest
        return (new SusuServicePersonalSusuPaymentRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
