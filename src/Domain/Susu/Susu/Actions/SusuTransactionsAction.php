<?php

declare(strict_types=1);

namespace Domain\Susu\Susu\Actions;

use App\Services\Susu\Requests\Susu\SusuTransactionsRequest;
use Domain\Mobile\Models\Customer;

final class SusuTransactionsAction
{
    public static function execute(Customer $customer, string $susu): array
    {
        // Execute and return the susu balance
        return (new SusuTransactionsRequest)->execute(customer: $customer, susu: $susu);
    }
}
