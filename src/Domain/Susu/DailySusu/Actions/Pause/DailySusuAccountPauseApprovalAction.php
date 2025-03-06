<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Pause;

use App\Services\Susu\Requests\DailySusu\AccountPause\SusuServiceDailySusuAccountPauseApprovalRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuAccountPauseApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $account_pause, array $request): array
    {
        // Execute the SusuServiceDailySusuAccountPauseApprovalRequest
        return (new SusuServiceDailySusuAccountPauseApprovalRequest)->execute(customer: auth()->user(), susu: $susu, account_pause: $account_pause, request: $request);
    }
}
