<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Pin;

use App\Jobs\Customer\Pin\CreatePinEvent;
use Domain\Customer\Actions\Common\GetCustomerAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class CreatePinJob implements ShouldQueue
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

        // Publish a CreatePinEvent
        CreatePinEvent::dispatch(
            customer: $customer,
            request: $this->request
        );
    }
}
