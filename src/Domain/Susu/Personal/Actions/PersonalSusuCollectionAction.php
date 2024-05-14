<?php

declare(strict_types=1);

namespace Domain\Susu\Personal\Actions;

use App\Services\Susu\Requests\PersonalSusu\PersonalSusuCollectionRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuCollectionAction
{
    public static function execute(Customer $customer): array
    {
        // Execute and return the PersonalSusuCollectionRequest
        return (new PersonalSusuCollectionRequest)->execute(customer: $customer);
    }
}
