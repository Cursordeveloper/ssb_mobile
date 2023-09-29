<?php

declare(strict_types=1);

namespace Domain\Customer\Jobs\Password;

use App\Jobs\Customer\Password\ChangePasswordConfirmationMessage;
use Domain\Customer\Actions\Common\FetchCustomerAction;
use Domain\Customer\Actions\Password\UpdatePasswordAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Throwable;

final class ChangePasswordJob implements ShouldQueue
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

    /**
     * @throws Throwable
     */
    public function handle(): void
    {
        // Get the customer
        $customer = FetchCustomerAction::execute(
            request: $this->request
        );

        // Execute the ChangePasswordAction
        UpdatePasswordAction::execute(
            customer: $customer,
            request: $this->request
        );

        // Publish to the notification service
        ChangePasswordConfirmationMessage::dispatch(
            customer_data: $customer->toData()
        );
    }
}
