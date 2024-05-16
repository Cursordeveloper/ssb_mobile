<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Kyc;

use App\Services\Customer\Requests\Kyc\KycRequest;
use Domain\Mobile\Models\Customer;

final class KycAction
{
    public static function execute(Customer $customer): array
    {
        // Post and return the http request
        return (new KycRequest)->execute(customer: $customer);
    }
}
