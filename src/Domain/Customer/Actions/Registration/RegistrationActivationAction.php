<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Registration;

use Domain\Customer\Enums\CustomerStatus;
use Domain\Customer\Events\Registration\CustomerActivatedEvent;
use Domain\Customer\Models\Customer;

final class RegistrationActivationAction
{
    public static function execute(
        Customer $customer
    ): void {
        // Update the customer status to active
        $customer->update([
            'status' => CustomerStatus::Active->value,
        ]);

        // Dispatch CustomerActivatedEvent
        CustomerActivatedEvent::dispatch(
            $customer->refresh(),
        );
    }
}
