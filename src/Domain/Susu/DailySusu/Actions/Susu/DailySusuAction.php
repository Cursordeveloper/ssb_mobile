<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Susu;

use App\Services\Susu\Requests\DailySusu\Account\SusuServiceDailySusuRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the DailySusuCreateRequest
        return (new SusuServiceDailySusuRequest)->execute(customer: $customer, susu: $susu);
    }
}
