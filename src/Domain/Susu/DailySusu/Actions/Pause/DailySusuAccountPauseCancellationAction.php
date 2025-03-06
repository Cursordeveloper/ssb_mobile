<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Pause;

use App\Services\Susu\Requests\DailySusu\AccountPause\SusuServiceDailySusuAccountPauseCancellationRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuAccountPauseCancellationAction
{
    public function execute(Customer $customer, string $susu, string $account_pause, array $request): array
    {
        // Execute the SusuServiceDailySusuAccountPauseCancellationRequest
        return (new SusuServiceDailySusuAccountPauseCancellationRequest)->execute(customer: $customer, susu: $susu, account_pause: $account_pause, request: $request);
    }
}
