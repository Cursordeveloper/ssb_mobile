<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Registration;

use App\Jobs\Customer\Registration\CustomerCreatedMessage;
use Domain\Customer\Actions\Registration\RegistrationAction;
use App\Jobs\Customer\Registration\RegisteredMessage;
use App\Jobs\Customer\Registration\RegistrationTokenMessage;
use Domain\Customer\Actions\Token\GenerateTokenAction;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class RegistrationJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly array $request
    ) {}

    public function handle(): void
    {
        // Create the customer
        $customer_created = RegistrationAction::execute(
            request: $this->request
        )->refresh();

        // Publish CustomerCreatedMessage to all microservices
        CustomerCreatedMessage::dispatch(
            customer_data: $customer_created,
            request: $this->request
        );

        // Generate the token
        $token = GenerateTokenAction::execute(
            customer: $customer
        );

        // Publish the TokenCreated message to the notification service
        RegistrationTokenMessage::dispatch(
            token_data: $token->toData()
        );
    }
}
