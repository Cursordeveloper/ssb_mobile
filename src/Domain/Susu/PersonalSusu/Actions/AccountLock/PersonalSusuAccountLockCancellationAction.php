<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\AccountLock;

use App\Services\Susu\Requests\PersonalSusu\AccountLock\SusuServicePersonalSusuAccountLockCancellationRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuAccountLockCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $account_lock, array $request): array
    {
        // Execute the SusuServicePersonalSusuAccountLockCancellationRequest
        return (new SusuServicePersonalSusuAccountLockCancellationRequest)->execute(customer: $customer, susu: $susu, account_lock: $account_lock, request: $request);
    }
}
