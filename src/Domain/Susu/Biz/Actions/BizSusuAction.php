<?php

declare(strict_types=1);

namespace Domain\Susu\Biz\Actions;

use App\Services\Susu\Requests\BizSusu\BizSusuRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Execute the BizSusuCreateRequest
        return (new BizSusuRequest)->execute(customer: $customer, susu: $susu);
    }
}
