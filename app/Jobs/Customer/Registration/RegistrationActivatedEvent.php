<?php

declare(strict_types=1);

namespace App\Jobs\Customer\Registration;

use App\Services\RabbitMQService;
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
        private readonly array $data,
    ) {
    }

    public function handle(): void
    {
        $headers = ['origin' => 'mobile', 'action' => 'ActivateCustomerAction'];
        $data = ['data' => $this->data];
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
