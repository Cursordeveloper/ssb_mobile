<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Pin;

use App\Services\Customer\Requests\Pin\PinChangeRequest;
use Domain\Mobile\Models\Customer;

final class PinChangeAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Publish and return message through http
        return (new PinChangeRequest)->execute(customer: $customer, request: $request);
    }
}
