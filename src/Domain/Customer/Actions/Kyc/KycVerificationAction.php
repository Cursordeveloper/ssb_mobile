<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Kyc;

use App\Services\Customer\Requests\Kyc\KycVerificationRequest;
use Domain\Mobile\Models\Customer;

final class KycVerificationAction
{
    public static function execute(Customer $customer, array $request): array
    {
        // Post and return the http request
        return (new KycVerificationRequest)->execute(customer: $customer, request: $request);
    }
}
