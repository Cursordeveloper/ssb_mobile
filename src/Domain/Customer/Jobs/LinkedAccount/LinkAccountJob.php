<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\LinkedAccount;

use App\Jobs\Customer\LinkedAccount\LinkAccountEvent;
use App\Services\SusuboxServices;
use Domain\Customer\Actions\Common\GetCustomerAction;
use Domain\Customer\DTO\LinkedAccountDTO\LinkedAccountDTO;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class LinkAccountJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly string $customer_email,
        private readonly array $request
    ) {
    }

    public function handle(): void
    {
        // Get the Customer
        $customer = GetCustomerAction::execute(
            resource: $this->customer_email
        );

        $susubox = new SusuboxServices();
        $susubox->linkAccount(
            LinkedAccountDTO::toArray(
                customer: $customer,
                request: $this->request,
            )
        );

        // Publish to the external service
//        LinkAccountEvent::dispatch(
//            LinkedAccountDTO::toArray(
//                customer: $customer,
//                request: $this->request,
//            )
//        );
    }
}
