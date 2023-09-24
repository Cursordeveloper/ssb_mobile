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
            'message' => 'Some Message',
            'action' => 'RegistrationActivatedEvent',
        ];
        $data = [
            'data' => [
                'type' => 'Customer',
                'attributes' => [
                    'first_name' => data_get(
                        target: $this->customer_data,
                        key: 'first_name'
                    ),
                    'email' => data_get(
                        target: $this->customer_data,
                        key: 'email'
                    ),
                    'phone_number' => data_get(
                        target: $this->customer_data,
                        key: 'phone_number'
                    ),
                ],
            ],
        ];

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(
            exchange: 'ssb_direct',
            type: 'direct',
            queue: 'notification',
            routingKey: 'ssb_not',
            data: $data,
            headers: $headers
        );
    }
}
