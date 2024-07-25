<?php

declare(strict_types=1);

namespace Domain\Susu\PersonalSusu\Actions\AccountPause;

use App\Services\Susu\Requests\PersonalSusu\AccountPause\SusuServicePersonalSusuAccountPauseRequest;
use Domain\Mobile\Models\Customer;

final class PersonalSusuAccountPauseAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServicePersonalSusuAccountPauseRequest
        return (new SusuServicePersonalSusuAccountPauseRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
