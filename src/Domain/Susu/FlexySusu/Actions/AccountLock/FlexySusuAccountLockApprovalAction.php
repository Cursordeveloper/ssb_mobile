<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\AccountLock;

use App\Services\Susu\Requests\FlexySusu\AccountLock\SusuServiceFlexySusuAccountLockApprovalRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuAccountLockApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $account_lock, array $request): array
    {
        // Execute the SusuServiceFlexySusuAccountLockApprovalRequest
        return (new SusuServiceFlexySusuAccountLockApprovalRequest)->execute(customer: auth()->user(), susu: $susu, account_lock: $account_lock, request: $request);
    }
}
