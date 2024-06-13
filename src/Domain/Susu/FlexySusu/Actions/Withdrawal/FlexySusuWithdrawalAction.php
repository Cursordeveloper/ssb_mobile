<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\Withdrawal;

use App\Services\Susu\Requests\FlexySusu\Withdrawal\FlexySusuWithdrawalRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuWithdrawalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute and return the FlexySusuWithdrawalRequest
        return (new FlexySusuWithdrawalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
