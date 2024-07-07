<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions;

use App\Services\Susu\Requests\FlexySusu\SusuServiceFlexySusuCreateRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuCreateAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Execute the FlexySusuCreateRequest
        return (new SusuServiceFlexySusuCreateRequest)->execute(customer: $customer, request: $request);
    }
}
