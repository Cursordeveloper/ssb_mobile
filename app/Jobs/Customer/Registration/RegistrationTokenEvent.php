<?php

declare(strict_types=1);

namespace App\Jobs\Customer\Registration;

use App\Services\RabbitMQService;
use Domain\Customer\DTO\CustomerData;
use Domain\Customer\DTO\TokenData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class RegistrationTokenEvent implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly CustomerData $customer_data,
        private readonly TokenData $token_data
    ) {
    }

    public function handle(): void
    {
        $headers = [
            'origin' => 'mobile',
            'action' => 'SendRegistrationTokenAction',
        ];
        $data = [
            'data' => [
                'type' => 'Token',
                'attributes' => [
                    'resource_id' => data_get(target: $this->customer_data, key: 'resource_id'),
                    'token' => data_get(target: $this->token_data, key: 'token'),
                    'token_expiration_date' => data_get(target: $this->token_data, key: 'token_expiration_date'),
                ],
            ],
        ];

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(exchange: 'ssb_direct', type: 'direct', queue: 'notification', routingKey: 'ssb_not', data: $data, headers: $headers);
    }
}
