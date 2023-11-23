<?php

namespace Domain\Mobile\Listeners\Token;

use App\Services\RabbitMQService;
use Domain\Mobile\Actions\Common\Token\GenerateTokenAction;
use Domain\Mobile\DTO\Token\TokenDTO;
use Illuminate\Contracts\Queue\ShouldQueue;

final class CreateRegistrationTokenListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        // Create the token
        $token = GenerateTokenAction::execute(customer: $event->customer);
        logger('logging the token data');

        $headers = ['origin' => 'mobile', 'action' => 'SendRegistrationTokenAction'];
        $data = ['data' => TokenDTO::toArray($token)];

        logger($token);

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(exchange: 'ssb_direct', type: 'direct', queue: 'notification', routingKey: 'ssb_not', data: $data, headers: $headers);
    }
}
