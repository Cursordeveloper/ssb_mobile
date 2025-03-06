<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions;

use App\Services\Susu\Requests\FlexySusu\SusuServiceFlexySusuRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the FlexySusuCreateRequest
        return (new SusuServiceFlexySusuRequest)->execute(customer: $customer, susu: $susu);
    }
}
