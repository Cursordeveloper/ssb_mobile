<?php

declare(strict_types=1);

namespace Domain\Susu\Susu\Actions;

use App\Services\Susu\Requests\Susu\SusuServiceSusuPauseRequest;
use Domain\Mobile\Models\Customer;

final class SusuPauseAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute and return the susu balance
        return (new SusuServiceSusuPauseRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
