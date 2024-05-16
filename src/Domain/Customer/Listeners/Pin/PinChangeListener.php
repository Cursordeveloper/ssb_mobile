<?php

namespace Domain\Customer\Listeners\Pin;

use App\Services\Customer\Requests\Pin\PinChangeRequest;
use Illuminate\Contracts\Queue\ShouldQueue;

final class PinChangeListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Publish message through http
        (new PinChangeRequest)->execute(customer: $event->customer, request: $event->request);
    }
}
