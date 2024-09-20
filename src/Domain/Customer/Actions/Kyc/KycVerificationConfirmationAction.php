<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Kyc;

use Domain\Customer\Jobs\Kyc\KycVerificationConfirmationJob;
use Domain\Mobile\Models\Customer;

final class KycVerificationConfirmationAction
{
    public static function execute(Customer $customer, array $request): void
    {
        // Dispatch the KycVerificationConfirmationJob
        KycVerificationConfirmationJob::dispatch($customer, $request);
    }
}
