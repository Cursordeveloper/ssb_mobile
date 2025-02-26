<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Mobile\Jobs\Registration\RegistrationActivationJob;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Services\Registration\RegistrationPersonalInformationService;
use Domain\Shared\Exceptions\Common\SystemFailureExec;
use Throwable;

final class RegistrationPersonalInformationAction
{
    /**
     * @throws SystemFailureExec
     */
    public static function execute(
        Customer $customer,
        array $request
    ): Customer {
        try {
            // Execute RegistrationPersonalInformationService and return the $customer
            RegistrationPersonalInformationService::execute(
                customer: $customer,
                request: $request
            );

            // Dispatch RegistrationActivationJob
            RegistrationActivationJob::dispatch(
                $customer->refresh(),
                $request
            );

            // Return the refreshed customer
            return $customer->refresh();
        } catch (Throwable $throwable) {
            throw new SystemFailureExec;
        }
    }
}
