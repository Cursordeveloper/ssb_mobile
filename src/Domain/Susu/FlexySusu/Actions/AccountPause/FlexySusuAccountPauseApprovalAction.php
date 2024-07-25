<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\AccountPause;

use App\Services\Susu\Requests\FlexySusu\AccountPause\SusuServiceFlexySusuAccountPauseApprovalRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuAccountPauseApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $account_pause, array $request): array
    {
        // Execute the SusuServiceFlexySusuAccountPauseApprovalRequest
        return (new SusuServiceFlexySusuAccountPauseApprovalRequest)->execute(customer: auth()->user(), susu: $susu, account_pause: $account_pause, request: $request);
    }
}
