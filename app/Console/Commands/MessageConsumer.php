<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Http\Requests\V1\Customer\Registration\PinCreatedAction;
use App\Services\RabbitMQService;
use Illuminate\Console\Command;

final class MessageConsumer extends Command
{
    protected $signature = 'app:message-consumer';

    public function handle(): void
    {
        $rabbitMQService = new RabbitMQService();
        $rabbitMQService->consume(exchange: 'ssb_direct', type: 'direct', queue: 'mobile', routingKey: 'ssb_mob', callback: function ($message) {
            $headers = $message->get('application_headers')->getNativeData();

            // Check the actions and call the right class
            if (data_get(target: $headers, key: 'origin') === 'mobile') {
                $message->ack();
            }
            elseif (data_get(target: $headers, key: 'action') === 'PinCreatedAction'){
                $register = PinCreatedAction::execute(
                    json_decode(
                        json: $message->getBody(),
                        associative: true
                    )
                );
                if ($register) $message->ack();
            }
        });
    }
}
