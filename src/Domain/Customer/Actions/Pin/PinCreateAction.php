<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Pin;

use App\Services\Customer\Requests\Pin\PinCreateRequest;
use Domain\Mobile\Models\Customer;

final class PinCreateAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Execute the CreatePinRequest to the ssb_customer service
        return (new PinCreateRequest)->execute(customer: $customer, request: $request);
    }
}
