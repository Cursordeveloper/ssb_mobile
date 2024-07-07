<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\Withdrawal;

use App\Services\Susu\Requests\FlexySusu\Withdrawal\SusuServiceFlexySusuWithdrawalCancellationRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuWithdrawalCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $withdrawal, array $request): array
    {
        // Execute and return the SusuServiceFlexySusuWithdrawalCancellationRequest
        return (new SusuServiceFlexySusuWithdrawalCancellationRequest)->execute(customer: $customer, susu: $susu, withdrawal: $withdrawal, request: $request);
    }
}
