<?php

declare(strict_types=1);

namespace Domain\Mobile\Actions\Registration;

use Domain\Mobile\Events\Registration\CustomerCreatedEvent;
use Domain\Mobile\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

final class RegistrationAction
{
    public static function execute(
        array $request
    ): Customer {
        // Create the customer
        $customer = new Customer();

        // Define the data
        $customer->resource_id = Str::uuid();
        $customer->first_name = data_get(
            target: $request,
            key: 'data.attributes.first_name',
        );
        $customer->last_name = data_get(
            target: $request,
            key: 'data.attributes.last_name',
        );
        $customer->phone_number = data_get(
            target: $request,
            key: 'data.attributes.phone_number',
        );
        $customer->email = data_get(
            target: $request,
            key: 'data.attributes.email',
        );
        $customer->password = Hash::make(data_get(
            target: $request,
            key: 'data.attributes.password',
        ));

        // Save the data into the database
        $customer->save();

        // Dispatch
        CustomerCreatedEvent::dispatch($customer);

        return $customer->refresh();
    }
}
