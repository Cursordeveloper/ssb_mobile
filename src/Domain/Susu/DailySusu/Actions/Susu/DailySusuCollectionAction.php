<?php

declare(strict_types=1);

namespace Domain\Susu\DailySusu\Actions\Susu;

use App\Services\Susu\Requests\DailySusu\Account\SusuServiceDailySusuCollectionRequest;
use Domain\Mobile\Models\Customer;

final class DailySusuCollectionAction
{
    public static function execute(Customer $customer): array
    {
        // Execute and return the DailySusuCollectionRequest
        return (new SusuServiceDailySusuCollectionRequest)->execute(customer: $customer);
    }
}
