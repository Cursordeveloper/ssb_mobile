<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Kyc;

use App\Services\Customer\Requests\Kyc\KycApprovalRequest;
use Domain\Mobile\Models\Customer;

final class KycApprovalAction
{
    public static function execute(Customer $customer, string $kyc, array $request): array
    {
        // Post and return the http request
        return (new KycApprovalRequest)->execute(customer: $customer, kyc: $kyc, request: $request);
    }
}
