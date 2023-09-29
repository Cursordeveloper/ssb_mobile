<?php

declare(strict_types=1);

namespace App\Jobs\Customer\Password;

use App\Services\RabbitMQService;
use Domain\Customer\DTO\CustomerData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class ChangePasswordConfirmationMessage implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected CustomerData $customer_data;

    public function __construct(CustomerData $customer_data)
    {
        $this->customer_data = $customer_data;
    }

    public function handle(): void
    {
        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->publish(exchange: 'ssb_direct', type: 'direct', queue: 'notification', routingKey: 'ssb_not', data: $this->customer_data->toArray());
    }
}
