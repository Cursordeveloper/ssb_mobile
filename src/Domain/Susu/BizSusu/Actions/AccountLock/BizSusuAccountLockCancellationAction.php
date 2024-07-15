<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\AccountLock;

use App\Services\Susu\Requests\BizSusu\AccountLock\SusuServiceBizSusuAccountLockCancellationRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuAccountLockCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $account_lock, array $request): array
    {
        // Execute the SusuServiceBizSusuAccountLockCancellationRequest
        return (new SusuServiceBizSusuAccountLockCancellationRequest)->execute(customer: $customer, susu: $susu, account_lock: $account_lock, request: $request);
    }
}
