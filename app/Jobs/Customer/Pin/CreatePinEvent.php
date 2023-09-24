<?php

declare(strict_types=1);

namespace App\Jobs\Customer\Pin;

use App\Services\RabbitMQService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePinEvent implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly array $request
    ) {
    }

    public function handle(): void
    {
        $data = [
            'data' => [
                'type' => 'Pin',
                'attributes' => [
                    'email' => data_get(target: $this->request, key: 'data.attributes.email'),
                    'pin' => data_get(target: $this->request, key: 'data.attributes.pin'),
                ],
            ],
        ];
        $headers = [
            'message' => 'Some Message',
            'action' => 'CreatePinEvent',
        ];

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(exchange: 'ssb_direct', type: 'direct', queue: 'customer', routingKey: 'ssb_cus', data: $data, headers: $headers);
    }
}
