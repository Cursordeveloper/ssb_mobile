<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Mobile\Jobs\Registration\RegistrationPasswordCreationJob;
use Domain\Mobile\Models\Customer;
use Domain\Mobile\Services\Registration\RegistrationPasswordCreationService;
use Domain\Shared\Exceptions\Registration\SystemFailureExec;
use Throwable;

final class RegistrationPasswordCreationAction
{
    /**
     * @throws SystemFailureExec
     */
    public static function execute(Customer $customer, array $request): Customer
    {
        try {
            // Execute the CustomerUpdatedService and return bool
            RegistrationPasswordCreationService::execute(customer: $customer, request: $request);

            // Dispatch CustomerPasswordCreatedJob
            RegistrationPasswordCreationJob::dispatch($customer->refresh());

            // Refresh and return the customer
            return $customer->refresh();
        } catch (Throwable $throwable) {
            // Throw the SystemFailureExec exception
            throw new SystemFailureExec;
        }
    }
}
