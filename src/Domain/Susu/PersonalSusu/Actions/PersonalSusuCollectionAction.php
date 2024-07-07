<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions;

use App\Services\Susu\Requests\PersonalSusu\SusuServicePersonalSusuCollectionRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuCollectionAction
{
    public static function execute(Customer $customer): array
    {
        // Execute and return the PersonalSusuCollectionRequest
        return (new SusuServicePersonalSusuCollectionRequest)->execute(customer: $customer);
    }
}
