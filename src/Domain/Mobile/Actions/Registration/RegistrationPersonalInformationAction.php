<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Events\Registration\RegistrationActivationEvent;
use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\Hash;

final class RegistrationPersonalInformationAction
{
    public static function execute(Customer $customer, array $request): Customer
    {
        // Update the customer
        $customer->update([
            'first_name' => data_get(target: $request, key: 'data.attributes.first_name'),
            'last_name' => data_get(target: $request, key: 'data.attributes.last_name'),
            'email' => data_get(target: $request, key: 'data.attributes.email'),
            'password' => Hash::make(data_get(target: $request, key: 'data.attributes.password')),
            'accepted_terms' => data_get(target: $request, key: 'data.attributes.accepted_terms'),
            'status' => CustomerStatus::Active->value,
        ]);

        // Dispatch RegistrationActivationEvent
        RegistrationActivationEvent::dispatch($customer, $request);

        // Return the refreshed customer
        return $customer->refresh();
    }
}
