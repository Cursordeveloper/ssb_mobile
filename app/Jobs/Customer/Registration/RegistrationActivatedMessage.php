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

final class RegistrationActivatedMessage implements ShouldQueue
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
        $data = [
            'data' => [
                'customer' => [
                    $this->customer_data,
                ],
            ],
        ];
        $headers = [
            'message' => 'Send welcome notification',
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
