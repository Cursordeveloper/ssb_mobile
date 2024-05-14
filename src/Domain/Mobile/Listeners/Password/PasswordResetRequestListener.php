<?php

namespace Domain\Mobile\Listeners\Password;

use App\Services\Notification\Data\Password\PasswordResetRequestTokenData;
use App\Services\Notification\Requests\Password\NotificationServicePasswordResetRequest;
use Illuminate\Contracts\Queue\ShouldQueue;

final class PasswordResetRequestListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Publish message through http
        (new NotificationServicePasswordResetRequest)->execute(customer: $event->customer, data: PasswordResetRequestTokenData::toArray($event->token));
    }
}
