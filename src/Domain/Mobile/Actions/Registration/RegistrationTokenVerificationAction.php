<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Mobile\Enums\CustomerStatus;
use Domain\Mobile\Events\Token\DeleteTokenEvent;
use Domain\Mobile\Models\Customer;

final class RegistrationTokenVerificationAction
{
    public static function execute(Customer $customer, array $request): Customer
    {
        // Update the customer status to active
        $customer->update(['status' => CustomerStatus::Verified->value]);

        // Dispatch DeleteTokenEvent
        DeleteTokenEvent::dispatch($customer);

        // Return the refreshed customer model
        return $customer->refresh();
    }
}
