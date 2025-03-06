<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Susu;

use App\Services\Susu\Requests\DailySusu\Account\SusuServiceDailySusuCreateRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuCreateAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Execute the DailySusuCreateRequest
        return (new SusuServiceDailySusuCreateRequest)->execute(customer: $customer, request: $request);
    }
}
