<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\AccountPause;

use App\Services\Susu\Requests\BizSusu\AccountPause\SusuServiceBizSusuAccountPauseApprovalRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuAccountPauseApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $account_pause, array $request): array
    {
        // Execute the SusuServiceBizSusuAccountPauseApprovalRequest
        return (new SusuServiceBizSusuAccountPauseApprovalRequest)->execute(customer: auth()->user(), susu: $susu, account_pause: $account_pause, request: $request);
    }
}
