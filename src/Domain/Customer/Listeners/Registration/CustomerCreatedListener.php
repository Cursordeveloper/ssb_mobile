<?php

namespace Domain\Customer\Listeners\Registration;

use App\Services\RabbitMQService;
use Domain\Customer\DTO\Registration\CustomerDTO;
use Illuminate\Contracts\Queue\ShouldQueue;

final class CustomerCreatedListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        $headers = [
            'origin' => 'mobile',
            'action' => 'CreateCustomerAction',
        ];
        $data = [
            'data' => CustomerDTO::toArray(
                customer: $event->customer,
            ),
        ];

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(
            exchange: 'ssb_fanout',
            type: 'fanout',
            queue: 'mobile',
            routingKey: 'ssb_mob',
            data: $data,
            headers: $headers,
        );
    }
}
