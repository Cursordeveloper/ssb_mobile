<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Lock;

use App\Services\Susu\Requests\DailySusu\AccountLock\SusuServiceDailySusuAccountLockCancellationRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuAccountLockCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $account_lock, array $request): array
    {
        // Execute the SusuServiceDailySusuAccountLockCancellationRequest
        return (new SusuServiceDailySusuAccountLockCancellationRequest)->execute(customer: $customer, susu: $susu, account_lock: $account_lock, request: $request);
    }
}
