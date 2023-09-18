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

final class RegistrationTokenMessage implements ShouldQueue
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
        $data = [
            'data' => [
                'customer' => [$this->customer_data],
                'token' => [$this->token_data],
            ],
        ];
        $headers = [
            'message' => 'Send activation token notification',
        ];

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(
            exchange: 'ssb_direct',
            type: 'direct',
            queue: 'notification',
            routingKey: 'ssb_not',
            data: $data,
            headers: $headers,
        );
    }
}
