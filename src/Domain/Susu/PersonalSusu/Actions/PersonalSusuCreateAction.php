<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions;

use App\Services\Susu\Requests\PersonalSusu\SusuServicePersonalSusuCreateRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuCreateAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Execute the PersonalSusuCreateRequest
        return (new SusuServicePersonalSusuCreateRequest)->execute(customer: $customer, request: $request);
    }
}
