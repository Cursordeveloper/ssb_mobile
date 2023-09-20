<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Pin;

use App\Jobs\Customer\Pin\PinCreatedMessage;
use Domain\Customer\Actions\Common\FetchCustomerAction;
use Domain\Customer\Actions\Pin\CreatePinAction;
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

    protected array $request;

    public function __construct(array $request)
    {
        $this->request = $request;
    }

    public function handle(): void
    {
        // Get the customer
        $customer = FetchCustomerAction::execute(
            request: $this->request
        );

        // Execute the create pin action
        CreatePinAction::execute(
            customer: $customer,
            request: $this->request
        );

        // Publish PinCreatedMessage to the notification service
        PinCreatedMessage::dispatch($customer->toData());
    }
}
