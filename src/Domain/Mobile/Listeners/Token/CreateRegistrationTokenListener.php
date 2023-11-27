<?php

namespace Domain\Mobile\Listeners\Token;

use App\Services\RabbitMQService;
use Domain\Mobile\Actions\Common\Token\GenerateTokenAction;
use Domain\Mobile\DTO\Token\TokenDTO;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;

final class CreateRegistrationTokenListener implements ShouldQueue
{
    /**
     * @throws Exception
     */
    public function handle(object $event): void
    {
        // Create the token
        $token = GenerateTokenAction::execute(customer: $event->customer);

        $headers = ['origin' => 'mobile', 'action' => 'SendRegistrationTokenAction'];
        $data = ['data' => TokenDTO::toArray($token)];

        $rabbitMQService = new RabbitMQService();;
        $rabbitMQService->publish(exchange: 'ssb_direct', type: 'direct', queue: 'notification', routingKey: 'ssb_not', data: $data, headers: $headers);
    }
}
