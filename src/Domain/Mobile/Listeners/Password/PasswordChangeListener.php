<?php

namespace Domain\Mobile\Listeners\Password;

use App\Services\Notification\Requests\Password\NotificationServicePasswordChangeConfirmationRequest;
use Illuminate\Contracts\Queue\ShouldQueue;

final class PasswordChangeListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Publish message through http
        (new NotificationServicePasswordChangeConfirmationRequest)->execute(customer: $event->customer);
    }
}
