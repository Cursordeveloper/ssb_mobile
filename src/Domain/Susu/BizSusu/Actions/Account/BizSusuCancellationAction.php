<?php

declare(strict_types=1);

namespace Domain\Susu\BizSusu\Actions\Account;

use App\Services\Susu\Requests\BizSusu\Account\SusuServiceBizSusuCancellationRequest;
use Domain\Mobile\Models\Customer;

final class BizSusuCancellationAction
{
    public static function execute(Customer $customer, string $susu, array $request): array
    {
        // Send the request and return the response
        return (new SusuServiceBizSusuCancellationRequest)->execute(customer: $customer, susu: $susu, request: $request);
    }
}
