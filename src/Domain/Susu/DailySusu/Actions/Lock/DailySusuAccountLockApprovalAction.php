<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Lock;

use App\Services\Susu\Requests\DailySusu\AccountLock\SusuServiceDailySusuAccountLockApprovalRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuAccountLockApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $account_lock, array $request): array
    {
        // Execute the SusuServiceDailySusuAccountLockApprovalRequest
        return (new SusuServiceDailySusuAccountLockApprovalRequest)->execute(customer: auth()->user(), susu: $susu, account_lock: $account_lock, request: $request);
    }
}
