<?php

declare(strict_types=1);

namespace Domain\Susu\Flexy\Actions;

use App\Services\Susu\Requests\FlexySusu\FlexySusuCollectionRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuCollectionAction
{
    public static function execute(Customer $customer): array
    {
        // Execute and return the FlexySusuCollectionRequest
        return (new FlexySusuCollectionRequest)->execute(customer: $customer);
    }
}
