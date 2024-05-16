<?php

namespace Domain\Mobile\Listeners\Registration;

use App\Services\Customer\Requests\Registration\CustomerServiceCustomerCreateRequest;
use App\Services\Ussd\Requests\UssdServiceCustomerCreateRequest;
use Domain\Mobile\Data\Registration\CustomerData;
use Illuminate\Contracts\Queue\ShouldQueue;

final class RegistrationActivationListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Define the message data
        $data = CustomerData::toArray(customer: $event->customer);

        // Publish message through http
        (new CustomerServiceCustomerCreateRequest)->execute(data: $data);
        (new UssdServiceCustomerCreateRequest)->execute(data: $data);
    }
}
