<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Lock;

use App\Services\Susu\Requests\DailySusu\AccountLock\SusuServiceDailySusuAccountLockRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuAccountLockAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServiceDailySusuAccountLockRequest
        return (new SusuServiceDailySusuAccountLockRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
