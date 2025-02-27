<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Account;

use App\Services\Susu\Requests\BizSusu\Account\SusuServiceBizSusuRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the BizSusuCreateRequest
        return (new SusuServiceBizSusuRequest)->execute(customer: $customer, susu: $susu);
    }
}
