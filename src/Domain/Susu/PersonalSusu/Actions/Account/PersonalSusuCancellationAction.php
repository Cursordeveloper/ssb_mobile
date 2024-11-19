<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\Account;

use App\Services\Susu\Requests\PersonalSusu\Account\SusuServicePersonalSusuCancellationRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuCancellationAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Send the request and return the response
        return (new SusuServicePersonalSusuCancellationRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
