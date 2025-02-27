<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Account;

use App\Services\Susu\Requests\BizSusu\Account\SusuServiceBizSusuCreateRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuCreateAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Execute the BizSusuCreateRequest
        return (new SusuServiceBizSusuCreateRequest)->execute(customer: $customer, request: $request);
    }
}
