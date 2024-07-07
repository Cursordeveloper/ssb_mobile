<?php

namespace Domain\Customer\Listeners\Pin;

use App\Services\Customer\Requests\Pin\CustomerServicePinChangeRequest;
use Illuminate\Contracts\Queue\ShouldQueue;

final class PinChangeListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Publish message through http
        (new CustomerServicePinChangeRequest)->execute(customer: $event->customer, request: $event->request);
    }
}
