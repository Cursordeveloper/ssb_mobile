<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Withdrawal;

use App\Services\Susu\Requests\BizSusu\Withdrawal\SusuServiceBizSusuFullWithdrawalRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuFullWithdrawalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute and return the SusuServiceBizSusuFullWithdrawalRequest
        return (new SusuServiceBizSusuFullWithdrawalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
