<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions;

use App\Services\Susu\Requests\FlexySusu\SusuServiceFlexySusuCancellationRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuCancellationAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Send the request and return the response
        return (new SusuServiceFlexySusuCancellationRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
