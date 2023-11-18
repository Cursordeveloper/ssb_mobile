<?php

namespace Domain\Mobile\Listeners\Password;

use App\Services\RabbitMQService;
use Illuminate\Contracts\Queue\ShouldQueue;

final class ChangePasswordConfirmationListener implements ShouldQueue
{
    public function handle(
        object $event,
    ): void {
        $headers = ['origin' => 'mobile', 'action' => 'SendPasswordChangeConfirmationAction'];
        $data = ['data' => $event->data];

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(
            exchange: 'ssb_direct',
            type: 'direct',
            queue: 'notification',
            routingKey: 'ssb_not',
            data: $data,
            headers: $headers,
        );
    }
}
