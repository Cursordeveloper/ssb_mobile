<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Mobile\Actions\Common\Customer\GetCustomerAction;
use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Events\Registration\CustomerActivatedEvent;
use Domain\Mobile\Models\Customer;

final class RegistrationActivationAction
{
    public static function execute(
        array $request,
    ): Customer {
        // Get the customer
        $customer = GetCustomerAction::execute(resource: data_get(target: $request, key: 'data.attributes.email'));

        // Update the customer status to active
        $customer->update(['status' => CustomerStatus::Active->value]);

        // Dispatch CustomerActivatedEvent
        CustomerActivatedEvent::dispatch($customer->refresh());

        // Return the refreshed customer model
        return $customer->refresh();
    }
}
