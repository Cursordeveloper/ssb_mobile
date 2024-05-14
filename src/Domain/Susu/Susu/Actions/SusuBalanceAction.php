<?php

declare(strict_types=1);

namespace Domain\Susu\Susu\Actions;

use App\Services\Susu\Requests\Susu\SusuBalanceRequest;
use Domain\Mobile\Models\Customer;

final class SusuBalanceAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute and return the susu balance
        return (new SusuBalanceRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
