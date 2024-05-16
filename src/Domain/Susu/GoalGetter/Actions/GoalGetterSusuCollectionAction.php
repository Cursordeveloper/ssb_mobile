<?php

declare(strict_types=1);

namespace Domain\Susu\GoalGetter\Actions;

use App\Services\Susu\Requests\GoalGetterSusu\GoalGetterSusuCollectionRequest;
use Domain\Mobile\Models\Customer;

final class GoalGetterSusuCollectionAction
{
    public static function execute(Customer $customer): array
    {
        // Execute and return the GoalGetterSusuCollectionRequest
        return (new GoalGetterSusuCollectionRequest)->execute(customer: $customer);
    }
}
