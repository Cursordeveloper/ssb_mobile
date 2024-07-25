<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\AccountPause;

use App\Services\Susu\Requests\BizSusu\AccountPause\SusuServiceBizSusuAccountPauseRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuAccountPauseAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the SusuServiceBizSusuAccountPauseRequest
        return (new SusuServiceBizSusuAccountPauseRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
