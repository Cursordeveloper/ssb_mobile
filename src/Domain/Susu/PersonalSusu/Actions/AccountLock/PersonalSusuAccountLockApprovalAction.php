<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\AccountLock;

use App\Services\Susu\Requests\PersonalSusu\AccountLock\SusuServicePersonalSusuAccountLockApprovalRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuAccountLockApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $account_lock, array $request): array
    {
        // Execute the SusuServicePersonalSusuAccountLockApprovalRequest
        return (new SusuServicePersonalSusuAccountLockApprovalRequest)->execute(customer: auth()->user(), susu: $susu, account_lock: $account_lock, request: $request);
    }
}
