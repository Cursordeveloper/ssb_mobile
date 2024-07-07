<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions;

use App\Services\Susu\Requests\FlexySusu\SusuServiceFlexySusuCollectionRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuCollectionAction
{
    public static function execute(Customer $customer): array
    {
        // Execute and return the FlexySusuCollectionRequest
        return (new SusuServiceFlexySusuCollectionRequest)->execute(customer: $customer);
    }
}
