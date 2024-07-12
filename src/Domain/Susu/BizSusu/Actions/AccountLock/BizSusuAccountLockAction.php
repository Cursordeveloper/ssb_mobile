<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\AccountLock;

use App\Services\Susu\Requests\BizSusu\AccountLock\SusuServiceBizSusuAccountLockRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuAccountLockAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServiceBizSusuAccountLockRequest
        return (new SusuServiceBizSusuAccountLockRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
