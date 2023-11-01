<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Pin;

use Domain\Customer\DTO\Pin\PinDTO;
use Domain\Customer\Events\Pin\CreatePinEvent;
use Domain\Mobile\Actions\Common\Customer\GetCustomerAction;
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
            resource: data_get(
                target: $this->request,
                key: 'data.attributes.email',
            )
        );

        // Publish a CreatePinEvent
        CreatePinEvent::dispatch(
            PinDTO::toArray(
                customer: $customer,
                request: $this->request
            )
        );
    }
}
