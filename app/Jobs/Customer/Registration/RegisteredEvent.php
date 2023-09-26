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

final class RegisteredEvent implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly CustomerData $customer_data,
        private readonly array $request
    ) {
    }

    public function handle(): void
    {
        $headers = [
            'origin' => 'mobile',
            'action' => 'CreateCustomerAction',
        ];
        $data = [
            'data' => [
                'type' => 'CustomerObserver',
                'id' => data_get(target: $this->customer_data, key: 'id'),
                'attributes' => [
                    'resource_id' => data_get(target: $this->customer_data, key: 'resource_id'),
                    'first_name' => data_get(target: $this->customer_data, key: 'first_name'),
                    'last_name' => data_get(target: $this->request, key: 'data.attributes.last_name'),
                    'phone_number' => data_get(target: $this->customer_data, key: 'phone_number'),
                    'email' => data_get(target: $this->customer_data, key: 'email'),
                ],
            ],
        ];

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(exchange: 'ssb_fanout', type: 'fanout', queue: 'web', routingKey: 'ssb_web', data: $data, headers: $headers);
    }
}
