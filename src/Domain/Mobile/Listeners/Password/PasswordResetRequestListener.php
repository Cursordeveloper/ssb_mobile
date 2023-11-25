<?php

namespace Domain\Mobile\Listeners\Password;

use App\Services\RabbitMQService;
use Domain\Mobile\DTO\Token\TokenDTO;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;

final class PasswordResetRequestListener implements ShouldQueue
{
    /**
     * @throws Exception
     */
    public function handle(object $event): void
    {
        $headers = ['origin' => 'mobile', 'action' => 'SendPasswordResetRequestAction'];
        $data = ['data' => TokenDTO::toArray($event->data)];

        $rabbitMQService = RabbitMQService::create();
        $rabbitMQService->publish(exchange: 'ssb_direct', type: 'direct', queue: 'notification', routingKey: 'ssb_not', data: $data, headers: $headers);
    }
}
