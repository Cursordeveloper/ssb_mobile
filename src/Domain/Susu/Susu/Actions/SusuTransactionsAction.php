<?php

declare(strict_types=1);

namespace Domain\Susu\Susu\Actions;

use App\Services\Susu\Requests\Susu\SusuTransactionsRequest;
use Domain\Mobile\Models\Customer;
use Illuminate\Http\Request;

final class SusuTransactionsAction
{
    public static function execute(Customer $customer, string $susu, Request $request): array
    {
        // Execute and return the susu balance
        return (new SusuTransactionsRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
