<?php

declare(strict_types=1);

namespace Domain\Customer\Actions\Pin;

use App\Services\Customer\CustomerService;
use Domain\Mobile\Actions\Common\Customer\GetCustomerAction;

final class CreatePinAction
{
    public static function execute(array $request): array
    {
        // Get the customer with the resource_id
        $customer = GetCustomerAction::execute(resource: data_get(target: $request, key: 'data.attributes.email'));

        // Execute the CreatePinRequest to the ssb_customer service
        return (new CustomerService)->createPin(customer: $customer, data: $request);
    }
}
