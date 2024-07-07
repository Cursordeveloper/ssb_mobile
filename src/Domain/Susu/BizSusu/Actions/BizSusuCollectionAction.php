<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions;

use App\Services\Susu\Requests\BizSusu\SusuServiceBizSusuCollectionRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuCollectionAction
{
    public static function execute(Customer $customer): array
    {
        // Execute and return the SusuServiceBizSusuCollectionRequest
        return (new SusuServiceBizSusuCollectionRequest)->execute(customer: $customer);
    }
}
