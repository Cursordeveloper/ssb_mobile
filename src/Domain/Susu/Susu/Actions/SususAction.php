<?php

declare(strict_types=1);

namespace Domain\Susu\Susu\Actions;

use App\Services\Susu\Requests\Susu\SususRequest;
use Domain\Mobile\Models\Customer;

final class SususAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Execute and return the SususRequest
        return (new SususRequest)->execute(customer: $customer, request: $request);
    }
}
