<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Withdrawal;

use App\Services\Susu\Requests\BizSusu\Withdrawal\SusuServiceBizSusuWithdrawalRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuWithdrawalAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the BizSusuWithdrawalRequest
        return (new SusuServiceBizSusuWithdrawalRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
