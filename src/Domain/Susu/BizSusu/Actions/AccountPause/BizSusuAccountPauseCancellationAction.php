<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\AccountPause;

use App\Services\Susu\Requests\BizSusu\AccountPause\SusuServiceBizSusuAccountPauseCancellationRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuAccountPauseCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $account_pause, array $request): array
    {
        // Execute the SusuServiceBizSusuAccountPauseCancellationRequest
        return (new SusuServiceBizSusuAccountPauseCancellationRequest)->execute(customer: $customer, susu: $susu, account_pause: $account_pause, request: $request);
    }
}
