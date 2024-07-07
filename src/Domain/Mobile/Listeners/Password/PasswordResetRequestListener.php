<?php

namespace Domain\Mobile\Listeners\Password;

use App\Services\Notification\Data\Password\NotificationServicePasswordResetRequestTokenData;
use App\Services\Notification\Requests\Password\NotificationServicePasswordResetRequest;
use Illuminate\Contracts\Queue\ShouldQueue;

final class PasswordResetRequestListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Publish message through http
        (new NotificationServicePasswordResetRequest)->execute(customer: $event->customer, data: NotificationServicePasswordResetRequestTokenData::toArray($event->token));
    }
}
