<?php

declare(strict_types=1);

namespace Domain\Susu\Susu\Actions;

use App\Services\Susu\Requests\Susu\SusuServiceSusuCloseRequest;
use Domain\Mobile\Models\Customer;

final class SusuCloseAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute and return the susu balance
        return (new SusuServiceSusuCloseRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
