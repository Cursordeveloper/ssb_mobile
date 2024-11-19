<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Account;

use App\Services\Susu\Requests\PersonalSusu\Account\SusuServicePersonalSusuCreateRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuCreateAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Execute the PersonalSusuCreateRequest
        return (new SusuServicePersonalSusuCreateRequest)->execute(customer: $customer, request: $request);
    }
}
