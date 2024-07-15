<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\AccountLock;

use App\Services\Susu\Requests\BizSusu\AccountLock\SusuServiceBizSusuAccountLockApprovalRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuAccountLockApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $account_lock, array $request): array
    {
        // Execute the SusuServiceBizSusuAccountLockApprovalRequest
        return (new SusuServiceBizSusuAccountLockApprovalRequest)->execute(customer: auth()->user(), susu: $susu, account_lock: $account_lock, request: $request);
    }
}
