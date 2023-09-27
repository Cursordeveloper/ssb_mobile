<?php

declare(strict_types=1);

namespace App\Jobs\Customer\Pin;

use App\Services\RabbitMQService;
use Domain\Customer\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class CreatePinEvent implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly Customer $customer,
        private readonly array $request
    ) {
    }

    public function handle(): void
    {
        $headers = [
            'origin' => 'mobile',
            'action' => 'CreatePinAction',
        ];
        $data = [
            'data' => [
                'type' => 'Pin',
                'attributes' => [
                    'pin' => data_get(target: $this->request, key: 'data.attributes.pin'),
                ],
                'relationships' => [
                    'customer' => [
                        'type' => 'Customer',
                        'attributes' => [
                            'resource_id' => data_get(target: $this->customer, key: 'resource_id')
                        ],
                    ],
                ],
            ],
        ];

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(exchange: 'ssb_direct', type: 'direct', queue: 'customer', routingKey: 'ssb_cus', data: $data, headers: $headers);
    }
}
