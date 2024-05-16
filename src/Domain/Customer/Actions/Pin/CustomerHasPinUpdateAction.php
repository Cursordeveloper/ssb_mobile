<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Pin;

use Domain\Mobile\Actions\Common\Customer\CustomerAction;

final class CustomerHasPinUpdateAction
{
    public static function execute(array $request): bool
    {
        // Get the customer with the resource_id
        $customer = CustomerAction::execute(resource: data_get(target: $request, key: 'data.attributes.phone_number'));

        // Update the customer status
        return $customer->update(['resource_id' => data_get(target: $request, key: 'data.attributes.resource_id'), 'has_pin' => true]);
    }
}
