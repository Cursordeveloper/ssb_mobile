<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Pause;

use App\Services\Susu\Requests\DailySusu\AccountPause\SusuServiceDailySusuAccountPauseRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuAccountPauseAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServiceDailySusuAccountPauseRequest
        return (new SusuServiceDailySusuAccountPauseRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
