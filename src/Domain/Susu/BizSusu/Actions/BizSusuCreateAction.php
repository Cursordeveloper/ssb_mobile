<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions;

use App\Services\Susu\Requests\BizSusu\SusuServiceBizSusuCreateRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuCreateAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Execute the BizSusuCreateRequest
        return (new SusuServiceBizSusuCreateRequest)->execute(customer: $customer, request: $request);
    }
}
