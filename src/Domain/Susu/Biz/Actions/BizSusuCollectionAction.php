<?php

declare(strict_types=1);

namespace Domain\Susu\Biz\Actions;

use App\Services\Susu\Requests\BizSusu\BizSusuCollectionRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuCollectionAction
{
    public static function execute(Customer $customer): array
    {
        // Execute and return the BizSusuCollectionRequest
        return (new BizSusuCollectionRequest)->execute(customer: $customer);
    }
}
