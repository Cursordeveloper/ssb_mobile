<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\AccountLock;

use App\Services\Susu\Requests\FlexySusu\AccountLock\SusuServiceFlexySusuAccountLockCancellationRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuAccountLockCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $account_lock, array $request): array
    {
        // Execute the SusuServiceFlexySusuAccountLockCancellationRequest
        return (new SusuServiceFlexySusuAccountLockCancellationRequest)->execute(customer: $customer, susu: $susu, account_lock: $account_lock, request: $request);
    }
}
