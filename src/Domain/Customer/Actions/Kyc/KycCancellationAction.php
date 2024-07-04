<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Kyc;

use App\Services\Customer\Requests\Kyc\CustomerServiceKycCancellationRequest;
use Domain\Mobile\Models\Customer;

final class KycCancellationAction
{
    public static function execute(Customer $customer, string $kyc, array $request): array
    {
        // Post and return the http request
        return (new CustomerServiceKycCancellationRequest)->execute(customer: $customer, kyc: $kyc, request: $request);
    }
}
