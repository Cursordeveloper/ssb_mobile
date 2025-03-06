<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\AccountLock;

use App\Services\Susu\Requests\FlexySusu\AccountLock\SusuServiceFlexySusuAccountLockRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuAccountLockAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServiceFlexySusuAccountLockRequest
        return (new SusuServiceFlexySusuAccountLockRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
