<?php

declare(strict_types=1);

namespace Domain\Susu\FlexySusu\Actions\AccountPause;

use App\Services\Susu\Requests\FlexySusu\AccountPause\SusuServiceFlexySusuAccountPauseRequest;
use Domain\Mobile\Models\Customer;

final class FlexySusuAccountPauseAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServiceFlexySusuAccountPauseRequest
        return (new SusuServiceFlexySusuAccountPauseRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
