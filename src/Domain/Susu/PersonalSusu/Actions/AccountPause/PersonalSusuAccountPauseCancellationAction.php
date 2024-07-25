<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\AccountPause;

use App\Services\Susu\Requests\PersonalSusu\AccountPause\SusuServicePersonalSusuAccountPauseCancellationRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuAccountPauseCancellationAction
{
    public static function execute(Customer $customer, string $susu, string $account_pause, array $request): array
    {
        // Execute the SusuServicePersonalSusuAccountPauseCancellationRequest
        return (new SusuServicePersonalSusuAccountPauseCancellationRequest)->execute(customer: $customer, susu: $susu, account_pause: $account_pause, request: $request);
    }
}
