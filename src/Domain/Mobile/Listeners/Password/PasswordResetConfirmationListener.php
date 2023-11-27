<?php

namespace Domain\Mobile\Listeners\Password;

use App\Services\RabbitMQService;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;

final class PasswordResetConfirmationListener implements ShouldQueue
{
    /**
     * @throws Exception
     */
    public function handle(object $event): void
    {
        $headers = ['origin' => 'mobile', 'action' => 'SendPasswordResetConfirmationAction'];
        $data = ['data' => $event->data];

        $rabbitMQService = new RabbitMQService();;
        $rabbitMQService->publish(exchange: 'ssb_direct', type: 'direct', queue: 'notification', routingKey: 'ssb_not', data: $data, headers: $headers);
    }
}
