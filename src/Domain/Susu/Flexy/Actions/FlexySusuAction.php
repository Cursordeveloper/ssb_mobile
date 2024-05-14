<?php

declare(strict_types=1);

namespace Domain\Susu\Flexy\Actions;

use App\Services\Susu\Requests\FlexySusu\FlexySusuRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the FlexySusuCreateRequest
        return (new FlexySusuRequest)->execute(customer: $customer, susu: $susu);
    }
}
