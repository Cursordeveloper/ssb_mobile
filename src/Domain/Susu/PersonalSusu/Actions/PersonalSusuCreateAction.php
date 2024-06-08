<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions;

use App\Services\Susu\Requests\PersonalSusu\PersonalSusuCreateRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuCreateAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Execute the PersonalSusuCreateRequest
        return (new PersonalSusuCreateRequest)->execute(customer: $customer, request: $request);
    }
}
