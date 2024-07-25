<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\AccountPause;

use App\Services\Susu\Requests\PersonalSusu\AccountPause\SusuServicePersonalSusuAccountPauseApprovalRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuAccountPauseApprovalAction
{
    public static function execute(Customer $customer, string $susu, string $account_pause, array $request): array
    {
        // Execute the SusuServicePersonalSusuAccountPauseApprovalRequest
        return (new SusuServicePersonalSusuAccountPauseApprovalRequest)->execute(customer: auth()->user(), susu: $susu, account_pause: $account_pause, request: $request);
    }
}
