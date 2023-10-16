<?php

namespace Domain\Customer\Listeners\Token;

use App\Services\RabbitMQService;
use Domain\Customer\DTO\Token\TokenDTO;
use Illuminate\Contracts\Queue\ShouldQueue;

final class PasswordResetRequestListener implements ShouldQueue
{
    public function handle(
        object $event,
    ): void {
        $headers = [
            'origin' => 'mobile',
            'action' => 'SendPasswordResetRequestAction',
        ];
        $data = [
            'data' => TokenDTO::toArray(
                $event->data,
            ),
        ];

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
