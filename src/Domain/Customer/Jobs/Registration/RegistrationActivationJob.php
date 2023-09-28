<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Registration;

use App\Jobs\Customer\Registration\RegistrationActivatedEvent;
use Domain\Customer\Actions\Common\GetCustomerAction;
use Domain\Customer\Actions\Registration\RegistrationActivationAction;
use Domain\Customer\Actions\Token\DeleteTokenAction;
use Domain\Customer\DTO\Registration\CustomerDTO;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class RegistrationActivationJob implements ShouldQueue
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
        // Get the customer
        $customer = GetCustomerAction::execute(
            request: $this->request
        );

        // Activate the customer account account
        RegistrationActivationAction::execute(
            customer: $customer
        );

        // Publish to notification queue
        $customer->refresh();
        RegistrationActivatedEvent::dispatch(
            CustomerDTO::toArray(customer: $customer)
        );

        // Delete the token after activation
        DeleteTokenAction::execute(
            customer: $customer
        );
    }
}
