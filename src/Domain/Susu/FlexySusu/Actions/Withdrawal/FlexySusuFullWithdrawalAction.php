<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\Withdrawal;

use App\Services\Susu\Requests\FlexySusu\Withdrawal\SusuServiceFlexySusuFullWithdrawalRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuFullWithdrawalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute and return the SusuServiceFlexySusuFullWithdrawalRequest
        return (new SusuServiceFlexySusuFullWithdrawalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
