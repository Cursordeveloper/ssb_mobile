<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\AccountPause;

use App\Services\Susu\Requests\FlexySusu\AccountPause\SusuServiceFlexySusuAccountPauseCancellationRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuAccountPauseCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $account_pause, array $request): array
    {
        // Execute the SusuServiceFlexySusuAccountPauseCancellationRequest
        return (new SusuServiceFlexySusuAccountPauseCancellationRequest)->execute(customer: $customer, susu: $susu, account_pause: $account_pause, request: $request);
    }
}
