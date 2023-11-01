<?php

namespace Domain\Mobile\Listeners\Registration;

use App\Services\RabbitMQService;
use Domain\Mobile\DTO\Registration\CustomerDTO;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerActivatedListener implements ShouldQueue
{
    public function handle(object $event): void
    {
        $headers = [
            'origin' => 'mobile',
            'action' => 'ActivateCustomerAction',
        ];
        $data = [
            'data' => CustomerDTO::toArray(
                $event->customer
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
