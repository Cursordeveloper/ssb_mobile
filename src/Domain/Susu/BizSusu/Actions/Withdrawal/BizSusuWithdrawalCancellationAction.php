<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Withdrawal;

use App\Services\Susu\Requests\BizSusu\Withdrawal\SusuServiceBizSusuWithdrawalCancellationRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuWithdrawalCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $withdrawal, array $request): array
    {
        // Execute the BizSusuWithdrawalApprovalRequest
        return (new SusuServiceBizSusuWithdrawalCancellationRequest)->execute(customer: $customer, susu: $susu, withdrawal: $withdrawal, request: $request);
    }
}
