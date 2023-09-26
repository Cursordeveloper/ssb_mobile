<?php

declare(strict_types=1);

namespace App\Jobs\Customer\Registration;

use App\Services\RabbitMQService;
use Domain\Customer\DTO\CustomerData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class RegistrationActivatedEvent implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly CustomerData $customer_data
    ) {
    }

    public function handle(): void
    {
        $headers = [
            'origin' => 'mobile',
            'action' => 'ActivateCustomerAction',
        ];
        $data = [
            'data' => [
                'type' => 'Customer',
                'attributes' => [
                    'resource_id' => data_get(target: $this->customer_data, key: 'resource_id'),
                ],
            ],
        ];

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(exchange: 'ssb_fanout', type: 'fanout', queue: 'web', routingKey: 'ssb_web', data: $data, headers: $headers);
    }
}
