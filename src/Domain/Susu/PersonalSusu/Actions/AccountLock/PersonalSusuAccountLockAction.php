<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\AccountLock;

use App\Services\Susu\Requests\PersonalSusu\AccountLock\SusuServicePersonalSusuAccountLockRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuAccountLockAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServicePersonalSusuAccountLockRequest
        return (new SusuServicePersonalSusuAccountLockRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
