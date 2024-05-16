<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Mobile\Jobs\Registration\RegistrationPasswordCreationJob;
use Domain\Mobile\Models\Customer;
use Domain\Shared\Exceptions\Registration\SystemFailureExec;
use Illuminate\Support\Facades\Hash;

final class RegistrationPasswordCreationAction
{
    public static function execute(Customer $customer, array $request): Customer
    {
        // Update the customer status to active
        $update = $customer->update([
            'email' => data_get(target: $request, key: 'data.attributes.email', default: $customer->email),
            'password' => Hash::make(data_get(target: $request, key: 'data.attributes.password')),
        ]);

        // Throw the SystemFailureExec if [update] fails
        if (! $update) {
            throw new SystemFailureExec;
        }

        // Dispatch CustomerPasswordCreatedJob
        RegistrationPasswordCreationJob::dispatch($customer->refresh());

        // Refresh and return the customer
        return $customer->refresh();
    }
}
