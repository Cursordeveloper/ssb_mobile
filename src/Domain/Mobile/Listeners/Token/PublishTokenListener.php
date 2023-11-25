<?php

namespace Domain\Mobile\Listeners\Token;

use App\Services\RabbitMQService;
use Domain\Mobile\DTO\Token\TokenDTO;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;

final class PublishTokenListener implements ShouldQueue
{
    /**
     * @throws Exception
     */
    public function handle(object $event): void
    {
        $headers = ['origin' => 'mobile', 'action' => 'SendRegistrationTokenAction'];
        $data = ['data' => TokenDTO::toArray($event->token)];

        $rabbitMQService = RabbitMQService::create();
        $rabbitMQService->publish(exchange: 'ssb_direct', type: 'direct', queue: 'notification', routingKey: 'ssb_not', data: $data, headers: $headers);
    }
}
