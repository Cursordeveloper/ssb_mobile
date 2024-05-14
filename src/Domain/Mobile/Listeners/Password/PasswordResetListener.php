<?php

namespace Domain\Mobile\Listeners\Password;

use App\Services\Notification\Requests\Password\PasswordResetConfirmationRequest;
use Illuminate\Contracts\Queue\ShouldQueue;

final class PasswordResetListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Publish message through http
        (new PasswordResetConfirmationRequest)->execute(customer: $event->customer);
    }
}
