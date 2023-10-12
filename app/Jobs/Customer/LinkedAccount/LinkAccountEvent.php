<?php

declare(strict_types=1);

namespace App\Jobs\Customer\LinkedAccount;

use App\Services\RabbitMQService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class LinkAccountEvent implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly array $data
    ) {
    }

    public function handle(): void
    {
        $headers = [
            'origin' => 'mobile',
            'action' => 'LinkAccountAction',
        ];
        $data = [
            'data' => $this->data,
        ];

        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(
            exchange: 'ssb_direct',
            type: 'direct',
            queue: 'customer',
            routingKey: 'ssb_cus',
            data: $data,
            headers: $headers,
        );
    }
}
