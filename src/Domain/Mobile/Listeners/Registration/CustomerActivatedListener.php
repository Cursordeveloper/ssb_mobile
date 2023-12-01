<?php

namespace Domain\Mobile\Listeners\Registration;

use App\Services\RabbitMQService;
use Domain\Mobile\DTO\Registration\CustomerDTO;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;

final class CustomerActivatedListener implements ShouldQueue
{
    /**
     * @throws Exception
     */
    public function handle(object $event): void
    {
        // Define the message headers
        $headers = ['origin' => 'mobile', 'action' => 'CreateCustomerAction'];

        // Define the message data
        $data = ['data' => CustomerDTO::toArray(customer: $event->data)];

        // Initialize the RabbitMQService and publish messages
        $rabbitMQService = new RabbitMQService();;
        $rabbitMQService->publish(exchange: 'ssb_direct', routingKey: 'ssb_uss', data: $data, headers: $headers);
        $rabbitMQService->publish(exchange: 'ssb_direct', routingKey: 'ssb_cus', data: $data, headers: $headers);
    }
}
